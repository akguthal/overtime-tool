/* mysql.exe -u root overtime < "file location" */
grant all on overtime.* to dbuser@localhost identified by 'password';

drop table if exists studentAthlete;
drop table if exists recruiter;
drop table if exists studentRecruiterConnection;
drop table if exists recruiterRecruiterConnection;

create table studentAthlete(name char(30) not null, email char(30) primary key, school char(30) not null, major char(30) not null, yearsInSchool int, sport char(30) not null, password char(255) not null);
insert into studentAthlete(name, email, image, school, major, yearsInSchool, sport, password) values("Melo Trimble", "melotrimble@gmail.com", [image], "Maryland", "Communications", 3, "Basketball", "melo");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("a", "a@gmail.com", "Purdue", "Business", 4, "Baseball", "a");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("b", "b@gmail.com", "Nebraska", "Communications", 5, "Basketball", "b");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("d", "d@gmail.com", "Rutgers", "Communications", 5, "Soccer", "d");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("c", "c@gmail.com", "Iowa", "Business", 4, "Football", "c");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("e", "e@gmail.com", "Maryland", "History", 3, "Soccer", "e");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("f", "f@gmail.com", "Rutgers", "Business", 2, "Basketball", "f");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("g", "g@gmail.com", "Penn State", "Communications", 1, "Football", "g");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("h", "h@gmail.com", "Maryland", "Engineering", 4, "Soccer", "h");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("i", "i@gmail.com", "Michigan", "Business", 3, "Basketball", "i");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("j", "j@gmail.com", "Northeastern", "History", 4, "Football", "j");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("k", "k@gmail.com", "Michigan State", "Communications", 4, "Baseball", "k");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("l", "l@gmail.com", "Minnestoa", "History", 4, "Football", "l");

create table recruiter(name char(30) not null, email char(30) primary key, profession char(30) not null, employer char(30) not null, school char(20) not null,  sport char(30) not null, password char(255) not null);
insert into recruiter(name, email, profession, employer, school, sport, password) values("Example Something", "example@something.com", "Whatever", "Some Company", "Maryland", "Basketball", "example");
insert into recruiter(name, email, profession, employer, school, sport, password) values("Jane Doe", "janedoe@aol.com", "Public Relations", "PR Company", "Michigan State", "Lacrosse", "jane");
insert into recruiter(name, email, profession, employer, school, sport, password) values("John Smith", "johnsmith@gmail.com", "Marketing", "Some marketing company", "Maryland", "Baseball", "john");

insert into recruiter(name, email, profession, employer, school, sport, password) values("A", "A@gmail.com", "PR", "ABC", "Purdue", "Baseball", "a");
insert into recruiter(name, email, profession, employer, school, sport, password) values("B", "B@gmail.com", "Teacher", "ABC", "Nebraska", "Basketball", "b");
insert into recruiter(name, email, profession, employer, school, sport, password) values("C", "C@gmail.com", "Teacher", "ABC", "Iowa", "Football", "c");
insert into recruiter(name, email, profession, employer, school, sport, password) values("D", "D@gmail.com", "Finance", "ABC", "Rutgers", "Soccer", "d");
insert into recruiter(name, email, profession, employer, school, sport, password) values("E", "E@gmail.com", "Teacher", "ABC", "Maryland", "Soccer", "e");
insert into recruiter(name, email, profession, employer, school, sport, password) values("F", "F@gmail.com", "PR", "ABC", "Rutgers", "Basketball", "f");
insert into recruiter(name, email, profession, employer, school, sport, password) values("G", "G@gmail.com", "PR", "ABC", "Penn State", "Football", "g");
insert into recruiter(name, email, profession, employer, school, sport, password) values("H", "H@gmail.com", "Teacher", "ABC", "Maryland", "Soccer", "h");
insert into recruiter(name, email, profession, employer, school, sport, password) values("I", "I@gmail.com", "PR", "ABC", "Michigan", "Basketball", "i");
insert into recruiter(name, email, profession, employer, school, sport, password) values("J", "J@gmail.com", "Finance", "ABC", "Northeastern", "Football", "j");
insert into recruiter(name, email, profession, employer, school, sport, password) values("K", "K@gmail.com", "Engineer", "ABC", "Michigan State", "Baseball", "k");
insert into recruiter(name, email, profession, employer, school, sport, password) values("L", "L@gmail.com", "Engineer", "ABC", "Minnestoa", "Football", "l");

create table studentRecruiterConnection(studentEmail char(30) not null,  recruiterEmail char(30) not null,  status enum('connected', 'pending', 'denied') not null);
insert into studentRecruiterConnection(studentEmail, recruiterEmail, status) values("melotrimble@gmail.com", "example@something.com", "connected");
insert into studentRecruiterConnection(studentEmail, recruiterEmail, status) values("melotrimble@gmail.com", "janedoe@aol.com", "connected");
insert into studentRecruiterConnection(studentEmail, recruiterEmail, status) values("melotrimble@gmail.com", "johnsmith@gmail.com", "pending");
insert into studentRecruiterConnection(studentEmail, recruiterEmail, status) values("diamondstone@umd.com", "example@something.com", "connected");
insert into studentRecruiterConnection(studentEmail, recruiterEmail, status) values("diamondstone@umd.com", "janedoe@aol.com", "denied");
insert into studentRecruiterConnection(studentEmail, recruiterEmail, status) values("c@gmail.com", "a@gmail.com", "connected");

create table recruiterRecruiterConnection(recruiterEmail1 char(30) not null, recruiterEmail2 char(30) not null, status enum('connected', 'pending', 'denied') not null);
insert into recruiterRecruiterConnection(recruiterEmail1, recruiterEmail2, status) values("example@something.com", "janedoe@aol.com", "connected");
insert into recruiterRecruiterConnection(recruiterEmail1, recruiterEmail2, status) values("johnsmith@gmail.com", "janedoe@aol.com", "pending");

/*Create a view for the established connections:*/
/*create view connected as select studentEmail, recruiterEmail from studentRecruiterConnection where status = 'connected';*/

/*Get the recruiters a student is connected to: */
/*select * from recruiter where email in (select recruiterEmail from connected where studentEmail = [student email]);*/

/*Get the students a recruiter is connected to:*/
/*select * from studentAthlete where email in (select studentEmail from connected where recruiterEmail = [recruiter email]);*/

/*	Field- 30
	School- 20		8
	Sport- 10
*/

/*	Majors
		Business
		Sociology
		Communication
		History
		Sports Science
		Criminal Justice
		Education
		Engineering
        Math
        Computer Science
        
		
	Fields
		PR- Business, Communication
		Marketing- Business, Communication
		Finance- Business
		Sales- Business, Communication
		Teacher- Education, Math, History
		Software Engineer- Computer Science
        Engineer- Engineering
		Athletic Trainer- Sport Science
		Personal Trainer- Sport Science
        Guidance Counselor- Sociology
        Police- Criminal Justice
*/