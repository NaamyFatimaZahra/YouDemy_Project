-- Création de la base de données
CREATE DATABASE YouDemy;
USE YouDemy;

-- Table des rôles
CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

-- Table des utilisateurs 
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    github_link VARCHAR(255) DEFAULT NULL,
    linkden_link VARCHAR(255) DEFAULT NULL,
    image VARCHAR(255) DEFAULT NULL,
    speciality VARCHAR(255),
    status ENUM('activated', 'suspend', 'deleted') DEFAULT 'activated',
    validation_account ENUM('pending', 'accepted','rejected') DEFAULT 'accepted',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

-- Table des catégories
CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des tags
CREATE TABLE tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des course
CREATE TABLE courses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    teacher_id INT NOT NULL,
    category_id INT NOT NULL,
    content VARCHAR(100),
    image_url VARCHAR(100),
    is_archived BOOLEAN DEFAULT FALSE,
    publication_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (teacher_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

-- Table de liaison entre les course et les tags
CREATE TABLE courses_tags (
    course_id INT NOT NULL,
    tag_id INT NOT NULL,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
);

-- Table des candidatures
CREATE TABLE enrollment (
    id INT PRIMARY KEY AUTO_INCREMENT,
    course_id INT NOT NULL,
    student_id INT NOT NULL,
    status ENUM('pending', 'accepted', 'rejected') DEFAULT 'accepted',
    created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Insertion des données de test

-- Rôles
INSERT INTO roles (name) VALUES
('admin'),
('teacher'),
('student');

-- Utilisateurs
-- Remarque : Les mots de passe sont hachés avec password_hash() en PHP
-- Tous les mots de passe ici sont "password123" à des fins de démonstration
INSERT INTO users (role_id, name, email, password, github_link, linkden_link, image, speciality, status) VALUES
(1, 'Admin User', 'admin@youdemy.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, 'accepted'),
(2, 'John Teacher', 'john.teacher@youdemy.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://github.com/johnteacher', 'https://linkedin.com/in/johnteacher', 'teacher_image.png', 'Développement Web', 'accepted'),
(3, 'Jane Student', 'jane.student@youdemy.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'jane_image.png', 'Science des Données', 'accepted');

-- Catégories
INSERT INTO categories (name) VALUES
('Développement Web'),
('Design'),
('Marketing Digital'),
('Gestion de Projet'),
('DevOps'),
('Science des Données'),
('Support Technique'),
('Ventes');

-- Tags
INSERT INTO tags (name) VALUES
('PHP'),
('JavaScript'),
('Python'),
('React'),
('Vue.js'),
('Docker'),
('AWS'),
('UI/UX'),
('SEO'),
('Agile'),
('Machine Learning'),
('SQL');

-- courses
INSERT INTO courses (title, description, teacher_id, category_id, content, is_archived, publication_date, update_date, image_url) VALUES
('Introduction à la Programmation', 'Un cours pour apprendre les bases de la programmation en Python.', 1, 2, 'Ce cours couvre les variables, les boucles, les fonctions et plus encore.', FALSE, '2025-01-01', '2025-01-15', 'https://example.com/images/programming.jpg'),
('Marketing Digital pour Débutants', 'Découvrez les bases du marketing digital, y compris le SEO et les médias sociaux.', 2, 3, 'Apprenez à optimiser votre site pour les moteurs de recherche et à gérer des campagnes publicitaires.', FALSE, '2025-01-10', '2025-01-18', 'https://example.com/images/marketing.jpg'),
('Les Fondamentaux de la Photographie', 'Un cours pour maîtriser les bases de la photographie, de la composition à l’éclairage.', 3, 4, 'Ce cours vous aidera à comprendre comment capturer de superbes photos avec votre appareil.', FALSE, '2025-01-05', '2025-01-12', 'https://example.com/images/photography.jpg'),
('Introduction à la Gestion de Projet', 'Un guide pour apprendre les bases de la gestion de projets avec les meilleures pratiques.', 4, 5, 'Ce cours inclut des outils comme Gantt et Trello, et des méthodologies comme Agile.', FALSE, '2025-01-08', '2025-01-14', 'https://example.com/images/project-management.jpg'),
('Apprendre la Cuisine Française', 'Découvrez les secrets des plats traditionnels français, des entrées aux desserts.', 5, 6, 'Ce cours inclut des recettes détaillées, des techniques de cuisson et des astuces pour réussir vos repas.', FALSE, '2025-01-12', '2025-01-19', 'https://example.com/images/french-cooking.jpg');


-- Associations entre courses et tags
INSERT INTO courses_tags (course_id, tag_id) VALUES
(1, 1), 
(1, 2), 
(1, 5), 
(2, 8), 
(3, 10), 
(4, 6), 
(4, 7), 
(5, 11),
(5, 12); 

-- Candidatures
INSERT INTO enrollment (course_id, student_id, status) VALUES
(1, 3, 'pending'),
(2, 3, 'accepted'),
(3, 3, 'rejected'),
(4, 3, 'accepted'),
(5, 3, 'pending');

-- Indexes pour optimiser les performances
CREATE INDEX idx_courses_category ON courses(category_id);
CREATE INDEX idx_courses_teacher ON courses(teacher_id);
CREATE INDEX idx_enrollment_course ON enrollment(course_id);
CREATE INDEX idx_enrollment_student ON enrollment(student_id);
CREATE INDEX idx_users_role ON users(role_id);
