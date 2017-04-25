drop table if exists studentAthlete;
drop table if exists recruiter;
drop table if exists studentRecruiterConnection;
drop table if exists recruiterRecruiterConnection;

create table studentAthlete(name char(30) not null, email char(30) primary key, school char(30) not null, major char(30) not null, yearsInSchool int, sport char(30) not null, password char(100) not null);
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("Diamond Stone", "diamondstone@umd.edu", "University of Maryland", "African American Studies", 1, "Basketball", "diamond");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("Melo Trimble", "melotrimble@gmail.com", "University of Maryland", "Communications", 3, "Basketball", "melo");

create table recruiter(name char(30) not null, email char(30) primary key, field char(30) not null, employer char(30) not null, school char(20) not null,  sport char(30) not null, password char(100) not null);
insert into recruiter(name, email, field, employer, school, sport, password) values("Example Something", "example@something.com", "Whatever", "Some Company", "Maryland", "Basketball", "example");
insert into recruiter(name, email, field, employer, school, sport, password) values("Jane Doe", "janedoe@aol.com", "Public Relations", "PR Company", "North Carolina", "Lacrosse", "jane");
insert into recruiter(name, email, field, employer, school, sport, password) values("John Smith", "johnsmith@gmail.com", "Marketing", "Some marketing company", "Maryland", "Baseball", "john");

create table studentRecruiterConnection(studentEmail char(30) not null,  recruiterEmail char(30) not null,  status enum('connected', 'pending', 'denied') not null);
insert into studentRecruiterConnection(studentEmail, recruiterEmail, status) values("melotrimble@gmail.com", "example@something.com", "connected");
insert into studentRecruiterConnection(studentEmail, recruiterEmail, status) values("melotrimble@gmail.com", "janedoe@aol.com", "connected");
insert into studentRecruiterConnection(studentEmail, recruiterEmail, status) values("melotrimble@gmail.com", "johnsmith@gmail.com", "pending");
insert into studentRecruiterConnection(studentEmail, recruiterEmail, status) values("diamondstone@umd.com", "example@something.com", "connected");
insert into studentRecruiterConnection(studentEmail, recruiterEmail, status) values("diamondstone@umd.com", "janedoe@aol.com", "denied");

create table recruiterRecruiterConnection(recruiterEmail1 char(30) not null, recruiterEmail2 char(30) not null, status enum('connected', 'pending', 'denied') not null);
insert into recruiterRecruiterConnection(recruiterEmail1, recruiterEmail2, status) values("example@something.com", "janedoe@aol.com", "connected");
insert into recruiterRecruiterConnection(recruiterEmail1, recruiterEmail2, status) values("johnsmith@gmail.com", "janedoe@aol.com", "pending");

/*Create a view for the established connections:*/
create view connected as select studentEmail, recruiterEmail from studentRecruiterConnection where status = 'connected';

/*Get the recruiters a student is connected to: */
--select * from recruiter where email in (select recruiterEmail from connected 	where studentEmail = [student email]);

/*Get the students a recruiter is connected to:*/
--select * from studentAthlete where email in (select studentEmail from connected where recruiterEmail = [recruiter email]);

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
		
	Fields
		PR- Business, Communication
		Marketing- Business, Communication
		Finance- Business
		Sales- Business, Communication
		Teacher- Education
		
		Athletic Trainer- Sport Science
		Personal Trainer- Sport Science
*/


