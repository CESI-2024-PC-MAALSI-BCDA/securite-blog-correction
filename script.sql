-- Création de la base de données
CREATE DATABASE IF NOT EXISTS securite_blog CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE securite_blog;

-- Table des utilisateurs
DROP TABLE IF EXISTS users;

CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       username VARCHAR(50) NOT NULL UNIQUE,
                       password VARCHAR(255) NOT NULL,
                       role ENUM('user', 'admin') DEFAULT 'user'
);

CREATE TABLE IF NOT EXISTS articles (
                                        id INT AUTO_INCREMENT PRIMARY KEY,
                                        title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    user_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    );

-- Articles de démonstration
INSERT INTO articles (title, content, user_id) VALUES
                                                   ('Sécuriser une base de données avec les droits utilisateurs', 'Apprenez à créer un utilisateur MySQL avec des permissions limitées pour éviter les abus.', 1),
                                                   ('Comprendre les injections SQL', 'Une faille d\'injection SQL permet d\'exécuter des requêtes malveillantes. Ce guide vous montre comment les repérer.', 1),
                                                   ('Protéger les sessions PHP', 'Utilisez des identifiants de session sécurisés, régénérez l\'ID à la connexion et limitez la durée de vie.', 2),
('Qu\'est-ce que l\'OWASP Top 10 ?', 'C\'est une liste des vulnérabilités web les plus critiques à connaître pour tout développeur.', 1),
                                                   ('XSS : Cross-site scripting expliqué', 'Le XSS permet d\'injecter du JavaScript malveillant dans une page. Découvrez les différents types.', 2),
('CSRF : falsification de requêtes', 'Les attaques CSRF utilisent la session authentifiée d\'un utilisateur contre lui-même.', 1),
                                                   ('Sécuriser les formulaires HTML', 'Validez toujours côté serveur, même si la validation côté client est utile pour l\'UX.', 1),
('Hash vs chiffrement : les différences', 'Le hash est irréversible, le chiffrement est réversible. Ne confondez plus jamais !', 2),
('Mots de passe : bonnes pratiques', 'Utilisez bcrypt ou Argon2, imposez une longueur minimale, et stockez les hash, pas les mots en clair.', 2),
('Limiter les tentatives de login', 'Implémentez un système de délai ou de CAPTCHA pour limiter les attaques par force brute.', 1);


-- Données d'exemple
INSERT INTO users (username, password, role) VALUES
                                                 ('alice', '$2y$10$0nJ9g62kGEe7UHr8sktnqu1n8isUDD3J1L1xW3flyWAvxxTXAu9NC', 'user'), -- mot de passe : "password123"
                                                 ('admin', '$2y$10$.QRF9Ez7tPIhqWR6uC1fq.7T.yA3kiDmM.altlhVJNtqse365YCgW', 'admin'); -- mot de passe : "adminpass"
