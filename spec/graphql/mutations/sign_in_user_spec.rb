# frozen_string_literal: true

require 'rails_helper'

module Mutations
  RSpec.describe SignInUser, type: :request do
    let(:user) { create(:user) }

    describe '.resolve' do
      context 'when valid credentials are given' do
        before(:each) { post '/graphql', params: { query: query(user.email, user.password) } }

        it 'returns a token' do
          json = JSON.parse(response.body)
          data = json['data']['signInUser']
          token = data.deep_symbolize_keys[:token]
          expect(token).to_not be_nil
          expect(JsonWebToken.decode(token)[:data]).to eq("user-id:#{user.id}")
        end

        it 'returns a user' do
          json = JSON.parse(response.body)
          data = json['data']['signInUser']
          expect(data.deep_symbolize_keys[:user]).to eq(
            email: user.email,
            firstName: user.first_name,
            lastName: user.last_name,
            id: user.id.to_s
          )
        end

        it 'sets the session header' do
          token = request.session[:token]
          expect(token).to_not be_nil
          expect(JsonWebToken.decode(token)[:data]).to eq("user-id:#{user.id}")
        end
      end

      context 'when invalid credentials are given' do
        before(:each) { post '/graphql', params: { query: query(user.email, 'blah') } }

        it 'returns null' do
          json = JSON.parse(response.body)
          expect(json['data']['signInUser']).to be_nil
        end
      end

      def query(email, password)
        <<~GQL
          mutation {
            signInUser(
              input: {
                credentials: {
                  email: "#{email}"
                  password: "#{password}"
                }
              }
            ) {
              token
              user {
                id
                firstName
                lastName
                email
              }
            }
          }
        GQL
      end
    end
  end
end
