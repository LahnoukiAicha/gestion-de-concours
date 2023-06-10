-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 10 juin 2023 à 16:00
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `upload`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant3`
--

CREATE TABLE `etudiant3` (
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `diplome` varchar(10) NOT NULL,
  `niveau` varchar(20) NOT NULL,
  `etablissement` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `cv` varchar(100) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant3`
--

INSERT INTO `etudiant3` (`nom`, `prenom`, `email`, `date`, `diplome`, `niveau`, `etablissement`, `photo`, `cv`, `login`, `pwd`) VALUES
('lahnouki', 'aicha', 'aichalahnouki@gmail.com', '2002-04-02', 'Bac+2', '3eme année', 'ENSA', 'uploads/th (19).jpg', 'uploads/Lahnouki_Aicha_CV.pdf', '0', '0'),
('hadeg', 'hiba', 'jdjdhd@jdjd.me', '2001-07-21', 'Bac+2', '3eme année', 'ensa', 'uploads/th.jpg', 'uploads/Lahnouki_Aicha_CV.pdf', '0', '0'),
('manadir', 'ibtissam', 'ibtissammanadir@gmail.com', '2001-02-24', 'Bac+2', '3eme année', 'ensa asefi', 'uploads/Lahnouki_Aicha_CV.png', 'uploads/Lahnouki_Aicha_CV.pdf', 'ibtissam', 'manadir123'),
('nhili', 'salma', '0salma.nhili0@gmail.com', '2001-06-25', 'Bac+2', '3eme année', 'ensa marrakech', 'uploads/picture.png', 'uploads/Analyse algo controle 2[1].pdf', 'salma', 'salma123'),
('hjedjk', 'dshdh', 'hsdgcs@gmail.com', '2001-02-25', 'Bac+3', '3eme année', 'ensa', 'uploads/', 'uploads/', 'Ensa', 'ensa123');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant4`
--

CREATE TABLE `etudiant4` (
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `diplome` varchar(10) NOT NULL,
  `niveau` varchar(10) NOT NULL,
  `etablissement` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `cv` varchar(100) NOT NULL,
  `login` varchar(10) NOT NULL,
  `pwd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant4`
--

INSERT INTO `etudiant4` (`nom`, `prenom`, `email`, `date`, `diplome`, `niveau`, `etablissement`, `photo`, `cv`, `login`, `pwd`) VALUES
('lahnouki', 'aicha', 'aichalahnouki@gmail.com', '2002-02-02', 'Bac+3', '4eme année', 'ENSA', 'uploads/321928319_2894890790644936_2277702252055871677_n.jpg', 'uploads/Lahnouki_Aicha_CV.pdf', 'aicha', 'jawda123'),
('dakech ', 'saad', 'dakechsaad@gmail.com', '2001-05-12', 'Bac+3', '4eme année', 'ENSA BM', 'uploads/picture.png', 'uploads/TG-TD-Serie6-ord-cor_1082_ (2).pdf', 'saad', 'saad123'),
('daalous', 'fatima', 'aichalahnouki@gmail.com', '2000-02-15', 'Bac+3', '4eme année', 'ensa asefi', 'uploads/aicha.jpg', 'uploads/Analyse algo controle 2.pdf', 'fatima', 'fatima123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
