/* mysql.exe -u root overtime < "file location" */
grant all on overtime.* to dbuser@localhost identified by 'password';

drop table if exists studentAthlete;
drop table if exists recruiter;
drop table if exists studentRecruiterConnection;
drop table if exists recruiterRecruiterConnection;
drop table if exists profileImage;
drop view  if exists studentImage;
drop view if exists recruiterImage;

create table studentAthlete(name char(30) not null, email char(30) primary key, school char(30) not null, major char(30) not null, yearsInSchool int, sport char(30) not null, password char(255) not null);
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("Melo Trimble", "melotrimble@gmail.com", "Maryland", "Communications", 3, "Basketball", "melo");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("Peter Frank", "pfrank@gmail.com", "Purdue", "Business", 4, "Baseball", "a");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("Isaiah Thomas", "ithomas@gmail.com", "Nebraska", "Communications", 5, "Basketball", "b");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("Lebron James", "ljames@gmail.com", "Rutgers", "Communications", 5, "Soccer", "d");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("Maikel Franco", "mfranco@gmail.com", "Iowa", "Business", 4, "Football", "c");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("Serena Williams", "swilliams@gmail.com", "Northeastern", "Math", 4, "Tennis", "s");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("Carson Wentz", "cwentz@gmail.com", "Maryland", "History", 3, "Soccer", "e");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("Mike Trout", "mtrout@gmail.com", "Rutgers", "Business", 2, "Basketball", "f");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("Claude Giroux", "cgiroux@gmail.com", "Penn State", "Communications", 1, "Football", "g");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("Alshon Jeffery", "ajeffery@gmail.com", "Maryland", "Engineering", 4, "Soccer", "h");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("Joel Embiid", "jembiid@gmail.com", "Michigan", "Business", 3, "Basketball", "i");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("Trisha Henry", "thenry@gmail.com", "Illinois", "Criminal Justice", 3, "Badmiton", "z");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("Ben Simmons", "bsimmons@gmail.com", "Northeastern", "History", 4, "Football", "j");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("Henry Toll", "htoll@gmail.com", "Michigan State", "Communications", 4, "Baseball", "k");
insert into studentAthlete(name, email, school, major, yearsInSchool, sport, password) values("Cameron Braun", "cbraun@gmail.com", "Minnestoa", "History", 4, "Football", "l");

create table recruiter(name char(30) not null, email char(30) primary key, profession char(30) not null, employer char(30) not null, school char(20) not null,  sport char(30) not null, password char(255) not null);
insert into recruiter(name, email, profession, employer, school, sport, password) values("Rebecca Ply", "rply@facebook.com", "Police", "Facebook", "Maryland", "Basketball", "example");
insert into recruiter(name, email, profession, employer, school, sport, password) values("Jane Doe", "janedoe@aol.com", "Marketing", "Edelman", "Michigan State", "Lacrosse", "jane");
insert into recruiter(name, email, profession, employer, school, sport, password) values("John Smith", "johnsmith@gmail.com", "Marketing", "W2O Group", "Maryland", "Baseball", "john");
insert into recruiter(name, email, profession, employer, school, sport, password) values("Kurt Gary", "kgary@gmail.com", "PR", "APCO Worldwide", "Purdue", "Baseball", "a");
insert into recruiter(name, email, profession, employer, school, sport, password) values("Mark Johnson", "mjohnson@gmail.com", "Teacher", "UMD Department of Computer Science", "Nebraska", "Basketball", "b");
insert into recruiter(name, email, profession, employer, school, sport, password) values("Josh Riley", "jriley@gmail.com", "Teacher", "Chester Academy", "Iowa", "Football", "c");
insert into recruiter(name, email, profession, employer, school, sport, password) values("Patrick Monroe", "pmonroe@gmail.com", "Finance", "Morgan Stanley", "Rutgers", "Soccer", "d");
insert into recruiter(name, email, profession, employer, school, sport, password) values("Derek Drake", "ddrake@gmail.com", "Teacher", "Harvard Law School", "Maryland", "Soccer", "e");
insert into recruiter(name, email, profession, employer, school, sport, password) values("Darrien Swoot", "dswoot@gmail.com", "PR", "Finn Partners", "Rutgers", "Basketball", "f");
insert into recruiter(name, email, profession, employer, school, sport, password) values("Adam Jones", "ajones@gmail.com", "PR", "Racepoint Global", "Penn State", "Football", "g");
insert into recruiter(name, email, profession, employer, school, sport, password) values("Marissa Lin", "mlin@gmail.com", "Teacher", "Minisink Valley High School", "Maryland", "Soccer", "h");
insert into recruiter(name, email, profession, employer, school, sport, password) values("Jose Bernard", "jbernard@gmail.com", "PR", "Edelman", "Michigan", "Basketball", "i");
insert into recruiter(name, email, profession, employer, school, sport, password) values("Witney Elton", "welton@gmail.com", "Finance", "J.P. Morgan", "Northeastern", "Football", "j");
insert into recruiter(name, email, profession, employer, school, sport, password) values("Karen Xi", "kxi@gmail.com", "Engineer", "Clarke Engineering", "Michigan State", "Baseball", "k");
insert into recruiter(name, email, profession, employer, school, sport, password) values("Norris Green", "ngreen@gmail.com", "Engineer", "Northrop Grumman", "Minnestoa", "Football", "l");

create table studentRecruiterConnection(studentEmail char(30) not null,  recruiterEmail char(30) not null,  status enum('connected', 'pending'  ) not null);
insert into studentRecruiterConnection(studentEmail, recruiterEmail, status) values("melotrimble@gmail.com", "example@something.com", "connected");
insert into studentRecruiterConnection(studentEmail, recruiterEmail, status) values("melotrimble@gmail.com", "janedoe@aol.com", "connected");
insert into studentRecruiterConnection(studentEmail, recruiterEmail, status) values("melotrimble@gmail.com", "johnsmith@gmail.com", "pending");
insert into studentRecruiterConnection(studentEmail, recruiterEmail, status) values("diamondstone@umd.com", "example@something.com", "connected");
insert into studentRecruiterConnection(studentEmail, recruiterEmail, status) values("diamondstone@umd.com", "janedoe@aol.com", "connected");
insert into studentRecruiterConnection(studentEmail, recruiterEmail, status) values("c@gmail.com", "a@gmail.com", "connected");

create table recruiterRecruiterConnection(recruiterEmail1 char(30) not null, recruiterEmail2 char(30) not null, status enum('connected', 'pending') not null);
insert into recruiterRecruiterConnection(recruiterEmail1, recruiterEmail2, status) values("example@something.com", "janedoe@aol.com", "connected");
insert into recruiterRecruiterConnection(recruiterEmail1, recruiterEmail2, status) values("johnsmith@gmail.com", "janedoe@aol.com", "pending");

create table profileImage(email char(30) not null, image longblob not null);

create view studentImage as select studentAthlete.*, profileImage.image from studentAthlete left outer join profileImage on studentAthlete.email=profileImage.email;
create view recruiterImage as select recruiter.*, profileImage.image from recruiter left outer join profileImage on recruiter.email=profileImage.email;

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