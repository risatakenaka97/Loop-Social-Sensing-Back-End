# frozen_string_literal: true

require 'rails_helper'

module Mutations
  RSpec.describe CreateUser, type: :request do
    describe '.resolve' do
      it 'creates a user' do
        expect do
          post '/graphql', params: { query: query }
        end.to change { User.count }.by(1)
      end

      it 'returns a user' do
        post '/graphql', params: { query: query }
        json = JSON.parse(response.body)
        data = json['data']['createUser']

        expect(data.deep_symbolize_keys).to include(
          id: be_present,
          firstName: 'Test',
          lastName: 'User',
          email: 'email@example.com'
        )
      end
    end

    def query
      <<~GQL
        mutation {
          createUser(
            input: {
              firstName: "Test"
              lastName: "User"
              authProvider: {
                credentials: {
                  email: "email@example.com"
                  password: "[omitted]"
                }
              }
            }
          ) {
            id
            firstName
            lastName
            email
          }
        }
      GQL
    end
  end
end
