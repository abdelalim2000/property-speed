@startuml
!theme mars

title Property Faster UML Diagram

class User {
id: int (PK)
first_name: varchar(50)
last_name: varchar(50)
title: varchar(50) {nullable}
username: varchar(50) {unique}
email: varchar(255) {unique}
email_verified_at: timestamp {nullable}
password: varchar(255) {nullable}
phone_number: varchar(20)
image_url: varchar(255)
gender: varchar(3)
birthday: date {nullable}
material_status: varchar(1) {nullable}
nationality: varchar(255) {nullable}
provider: varchar(20) {nullable}
provider_id: varchar(255) {nullable}
ban: boolean
remember_token: varchar(255) {nullable}
created_at: timestamp
updated_at: timestamp
}

class Corporate {
id: int (PK)
name: varchar(150)
commercial_register_number: varchar(255)
tax_card_number: varchar(255)
logo: varchar(255)
address: varchar(255)
website: varchar(255) {nullable}
social: json {nullable}
created_at: timestamp
updated_at: timestamp
}

class Franchise {
id: int (PK)
name: varchar(150)
commercial_register_number: varchar(255)
logo: varchar(255)
address: varchar(255)
corporate_id: int (FK)
manager_id: int (FK) {nullable}
created_at: timestamp
updated_at: timestamp
}

class PasswordResetToken {
email: varchar(255) (PK)
token: varchar(255)
created_at: timestamp {nullable}
}

class PersonalAccessToken {
id: int (PK)
tokenable_type: varchar(255)
tokenable_id: int
name: varchar(255)
token: varchar(64) (UK)
abilities: text {nullable}
last_used_at: timestamp {nullable}
expires_at: timestamp {nullable}
created_at: timestamp
updated_at: timestamp
}

User <.> User : manages (optional)
User "*" -- "1" Franchise : belongs to (composition)
User "1" -- "*" PasswordResetToken : has password reset tokens
User "1" -- "*" PersonalAccessToken : has personal access tokens
Corporate "1" -- "*" Franchise : owns
@enduml
