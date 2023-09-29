CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	username	varchar(250)
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

	#	Name	Type	Collation	Attributes	Null	Default	Comments	Extra	Action
	1	id  Primary	int(11)			No	None		AUTO_INCREMENT	 Change Change	 Drop Drop	
 	2	timestamp	timestamp			No	current_timestamp()			 Change Change	 Drop Drop	
 	3	username	varchar(250)	utf8_general_ci		No	None			 Change Change	 Drop Drop	
 	4	email  Index	varchar(255)	utf8_general_ci		No	None			 Change Change	 Drop Drop	
 	5	password	varchar(255)	utf8_general_ci		No	None			 Change Change	 Drop Drop	


