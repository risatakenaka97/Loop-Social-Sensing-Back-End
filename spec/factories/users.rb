# frozen_string_literal: true

FactoryBot.define do
  factory :user do
    first_name { 'Test' }
    last_name { 'Name' }
    email { 'example@test.com' }
    password_digest { 'password' }
    password { 'password' }
  end
end
