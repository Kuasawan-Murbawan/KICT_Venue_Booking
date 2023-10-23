# KICT_Venue_Booking

Website Link -> https://kict-venue-booking.000webhostapp.com/homepage.html

  This project is meant to help the KICT community in IIUM to book a venue among all the venues provided in the KICT building. Recently, the community has been set back by the lack of a venue booking system to do their duty such as teaching, holding events and programs, or for personal reasons because of the clashes between two or more students and lecturers when booking a venue just by word of mouth. This system is designed to help the KICT community especially for the students and lecturers to book a venue via an online system. The system should be able to manage all of the venue booking data while also avoiding clashes when booking a venue. Mind you that this system is just a proof of concept and hopefully, the system will be useful for everyone while increasing the comfortability and productivity of the KICT community in the long run.

 ## Entity Relationship Diagram

 
![Screenshot 2023-10-24 014900](https://github.com/Kuasawan-Murbawan/KICT_Venue_Booking/assets/74280845/ca024b5c-64a3-421f-8adc-23346c18c823)

- Tables are connected via the relationship arrows using Crow Foot’s Notation.
- The single dash or foot represents one relationship while the many dashes represent many relationships. 
- Room tables and Booking tables are connected with a one-to-many relationship which means multiple bookings can have the same room, but only one room is available for a booking at a time. 
- Booking tables and Student tables have a many-to-one relationship which means a booking can only be booked by one student, but a student can book multiple bookings (one book per month).
- Student table and Staff table have a one-to-one relationship, which means a student that wants to do venue booking will have only one staff member to record and save the information into the system.

## Data Dictionary
### Room

| Attribute Name | Data Type | Size | Constraint |
| -------------- | --------- | ---- | ---------- |
| ROOM_ID        | VARCHAR2  | 20   | Primary Key |
| ROOM_NAME      | VARCHAR2  | 25   | Not Null   |
| ROOM_BLOCK     | VARCHAR2  | 1    | Not Null   |
| ROOM_FLOOR     | NUMBER    | 1    | Not Null   |
| ROOM_CAP       | NUMBER    | 2    | Not Null   |

### Student

| Attribute Name | Data Type | Size | Constraint |
| -------------- | --------- | ---- | ---------- |
| STUDENT_ID     | NUMBER    | 3    | Primary Key |
| STUDENT_NAME   | VARCHAR2  | 30   | Not Null   |
| STUDENT_DEPT   | VARCHAR2  | 20   | Not Null   |
| STUDENT_YEAR   | NUMBER    | 5    | Not Null   |

### Staff

| Attribute Name | Data Type | Size | Constraint |
| -------------- | --------- | ---- | ---------- |
| STAFF_ID       | NUMBER    | 3    | Primary Key |
| STAFF_NAME     | VARCHAR2  | 30   | Not Null   |
| STAFF_DEPT     | VARCHAR2  | 20   | Not Null   |
| STAFF_SALARY   | NUMBER    | 5    | Not Null   |

### Booking

| Attribute Name | Data Type | Size | Constraint |
| -------------- | --------- | ---- | ---------- |
| BOOK_ID        | NUMBER    | 4    | Primary Key |
| BOOK_DATE      | DATE      | -    | Not Null   |
| BOOK_START     | DATE      | -    | Not Null   |
| BOOK_END       | DATE      | -    | Not Null   |
| ROOM_ID        | VARCHAR2  | 20   | Foreign Key |
| STAFF_ID       | NUMBER    | 3    | Foreign Key |
| STUDENT_ID     | NUMBER    | 3    | Foreign Key |

## Web Application Database
For creating a Web Application database, we use HTML and pass the values to PHP files for it to process the command. For the local database, we are using Xampp & PHPMyAdmin. Then, we deploy our database and website using 000webhost which uses the same principle as in PhpMyAdmin. If you want to see all the code, feel free to visit my GitHub page. Kuasawan-Murbawan/KICT_Venue_Booking (github.com)

Website Link -> https://kict-venue-booking.000webhostapp.com/homepage.html


![Screenshot 2023-10-24 015637](https://github.com/Kuasawan-Murbawan/KICT_Venue_Booking/assets/74280845/7169cc64-e166-4e0c-b91b-5c6729d063bd)
> Homepage

![Screenshot 2023-10-24 015745](https://github.com/Kuasawan-Murbawan/KICT_Venue_Booking/assets/74280845/399a6974-a4b9-4fad-a1d8-e007e3c45fa4)

> Booking List
