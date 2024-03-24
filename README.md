@startuml
!theme blueprint

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

class Location {
id: int (PK)
name: json(150)
type: varchar(255)
location_schema: varchar(255)
latitude: decimal(11, 8) {nullable}
longitude: decimal(11, 8) {nullable}
radius: decimal(10, 2) {nullable}
parent_id: int (FK) {nullable}
created_at: timestamp
updated_at: timestamp
}

class TagCategory {
id: int (PK)
name: json
created_at: timestamp
updated_at: timestamp
}

class Tag {
id: int (PK)
name: json
icon: varchar(255)
price_type: varchar(255)
type: varchar(255)
parent_id: int (FK) {nullable}
created_at: timestamp
updated_at: timestamp
}

class Property {
id: int (PK)
name: json
description: json
meta_data: json
slug_en: string
slug_ar: string
price: json
location_id: int (FK)
user_id: int (FK)
active: boolean
created_at: timestamp
updated_at: timestamp
}

User <.> User : manages (optional)
User "1" -- "1..*" Franchise : Works at
User "1" -- "*" PasswordResetToken : has password reset tokens
User "1" -- "*" PersonalAccessToken : has personal access tokens
User "1" -- "*" Property : owns
Property "0..*" -- "*" Tag : has tags (with Pivot Type: "main", "chield")
Property "1" -- "0..1" Location : located at (belongs to)
Corporate "1" -- "*" Franchise : owns
Franchise <..> User : has manager (optional)
Location "0..1" -- "1" Location : has parent (optional)
Tag ".." <--> TagCategory : categorized under (many-to- many)
@enduml
