CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    task_name VARCHAR(255) NOT NULL,
    task_description TEXT,
    priority ENUM('Important', 'Regular') DEFAULT 'Regular',
    deadline TIMESTAMP,
    completed BOOLEAN DEFAULT FALSE,
    category VARCHAR(255), -- Added category column
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
