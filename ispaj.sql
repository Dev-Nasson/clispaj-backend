-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- SO do servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- A despejar estrutura da base de dados para clispaj
CREATE DATABASE IF NOT EXISTS `clispaj` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `clispaj`;

-- A despejar estrutura para tabela clispaj.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tituloum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulodois` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulotres` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iconeum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iconedois` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iconetres` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela clispaj.banners: ~3 rows (aproximadamente)
INSERT INTO `banners` (`id`, `imagem`, `tituloum`, `titulodois`, `titulotres`, `iconeum`, `iconedois`, `iconetres`, `status`, `descricao`, `created_at`, `updated_at`) VALUES
	(6, 'imagens/Uujz1pdYEsJIxl4lFpLzI83E7iK9BmtUZPFJNjB4.png', 'Sua saúde', 'é nossa', 'Prioridade', 'imagens/WnN3o8crZi931bjrlLRL6WbX3HTWZlZh5CMLrDrl.png', 'imagens/A6D81Hiy1OEpJU3Ik1QuybKY844B0h1qV9l1b8ZQ.png', 'imagens/Fbi6lT58TY6Ck24aA5gm0WY5E9618mYWEDaNzFhu.png', 'ativado', 'Descubra as Soluções Totais de Cuidados de Saúde que integram tecnologia avançada, conhecimento especializado e um compromisso inabalável com o bem-estar.', '2025-09-25 13:35:34', '2025-09-25 13:35:34'),
	(7, 'imagens/PT3qBEVJlowiLdWNnbXFdNYepmwShb0ZznxqgRIh.png', 'Profissionais', 'de', 'alto nível', 'imagens/G8dLbekdjXxMtNC7dkgViaKiZrx9yviGtYeA71Kb.png', 'imagens/VzyzzPkOe7ca1m9lNuCLqNTf6jgZbAB25k2KZnAY.png', 'imagens/F7znPJah5OvWHcRUgCIJFnMLI8Uj1wgHpyMH94if.png', 'ativado', 'A CLISPAJ é conhecida por contar com uma equipe de profissionais altamente qualificados e dedicados. Seus profissionais são especializados em diversas áreas da saúde, incluindo Clínica geral, pediatria, ginecologia, dermatologia, odontologia, fisioterapia e psicologia, entre outras especialidades.', '2025-09-25 13:49:50', '2025-09-25 13:49:50'),
	(9, 'imagens/xBgsJVPqemdMwnyfuWUZsxAc8WhRG0yTUgW7Jnsx.png', 'Nossos', 'pacientes', 'alegres', NULL, NULL, NULL, 'disativado', 'A CLISPAJ é conhecida por contar com uma equipe de profissionais altamente qualificados e dedicados. Seus profissionais são especializados em diversas áreas da saúde, incluindo Clínica geral, pediatria, ginecologia, dermatologia, odontologia, fisioterapia e psicologia, entre outras especialidades.', '2025-09-25 13:59:06', '2025-09-30 09:20:22');

-- A despejar estrutura para tabela clispaj.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `categoria_nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela clispaj.categorias: ~4 rows (aproximadamente)
INSERT INTO `categorias` (`id`, `categoria_nome`, `created_at`, `updated_at`) VALUES
	(1, 'Engenharia', '2024-08-09 08:01:45', '2024-08-09 08:01:45'),
	(2, 'Saúde', '2024-08-09 08:01:45', '2024-08-09 08:01:45'),
	(3, 'Ciências Sociais', '2024-08-09 08:01:45', '2024-08-09 08:01:45'),
	(4, 'Ciências da computação', '2024-08-09 08:01:45', '2024-08-09 08:01:45');

-- A despejar estrutura para tabela clispaj.contactos
CREATE TABLE IF NOT EXISTS `contactos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assunto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela clispaj.contactos: ~3 rows (aproximadamente)
INSERT INTO `contactos` (`id`, `nome`, `imail`, `numero`, `assunto`, `status`, `descricao`, `created_at`, `updated_at`) VALUES
	(1, 'Nasson', 'nassonkambala02@gmail.com', '929425150', 'Consulta', 'disativado', 'Vamos marcar uma consulta', '2024-08-09 08:02:54', '2025-09-30 08:54:37'),
	(4, 'teste', 'nassonkambala02@gmail.com', '929425150', 'dsd', 'disativado', 'sdsds', '2024-08-16 14:00:50', '2025-09-30 08:54:44'),
	(5, NULL, NULL, NULL, NULL, 'disativado', NULL, '2024-09-24 11:02:51', '2025-09-30 08:54:47');

-- A despejar estrutura para tabela clispaj.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela clispaj.countries: ~0 rows (aproximadamente)

-- A despejar estrutura para tabela clispaj.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela clispaj.failed_jobs: ~0 rows (aproximadamente)

-- A despejar estrutura para tabela clispaj.galerias
CREATE TABLE IF NOT EXISTS `galerias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela clispaj.galerias: ~8 rows (aproximadamente)
INSERT INTO `galerias` (`id`, `imagem`, `status`, `created_at`, `updated_at`) VALUES
	(10, 'imagens/r492sizUeBgVdY0Jtg6vbzjuSH9gQZkcRRv0sGhs.jpg', 'ativado', '2025-09-26 08:42:18', '2025-09-26 08:42:18'),
	(11, 'imagens/FSgSy7FAnaEpUanztUcE0qRmsCQOwLBKDEijhvkz.jpg', 'ativado', '2025-09-26 10:14:40', '2025-09-26 10:14:40'),
	(12, 'imagens/pvgasIwCnnDtf1l42rP9BstsRVsd9GfYsZLkyyL1.jpg', 'ativado', '2025-09-26 10:17:01', '2025-09-26 10:17:01'),
	(13, 'imagens/OBlRjp9bCiHkYjJf9OJfl7RHR1RgfrKm8yLPo30d.jpg', 'ativado', '2025-09-26 10:18:06', '2025-09-26 10:18:06'),
	(14, 'imagens/eeBlnvS5e7xjC2OhXOA9dkiIgAf9SkVsTyc6aHIO.jpg', 'ativado', '2025-09-29 09:17:50', '2025-09-29 09:17:50'),
	(15, 'imagens/VvRdlGzkxu9P5QmFQcB77jjMA8zsex2G4iz60li2.jpg', 'ativado', '2025-09-29 09:19:06', '2025-09-29 09:19:06'),
	(16, 'imagens/0fSOzawBIOdLnJXylznArFy0kUIPxzxLY5VMhOk7.jpg', 'ativado', '2025-09-29 09:21:49', '2025-09-29 09:21:49'),
	(17, 'imagens/MZWjxwklnW7K1clnQ1BZFxrp5CxEZrjg4usCvMq8.jpg', 'ativado', '2025-09-29 09:22:08', '2025-09-29 09:22:08');

-- A despejar estrutura para tabela clispaj.horarios
CREATE TABLE IF NOT EXISTS `horarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nomeum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomedois` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nometres` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomequatro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela clispaj.horarios: ~0 rows (aproximadamente)
INSERT INTO `horarios` (`id`, `nomeum`, `nomedois`, `nometres`, `nomequatro`, `status`, `created_at`, `updated_at`) VALUES
	(1, '24/24H', 'Segunda a Sexta-feira - 8H-18H', '7H-19H', '7H-12H', 'ativado', '2024-09-25 10:44:22', '2024-09-25 11:30:30');

-- A despejar estrutura para tabela clispaj.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela clispaj.migrations: ~16 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2023_05_24_083241_create_categorias_table', 1),
	(7, '2023_05_24_105638_create_subcategorias_table', 1),
	(8, '2023_12_07_103852_create_testes_table', 1),
	(9, '2024_05_05_165409_create_countries_table', 1),
	(10, '2024_07_30_134725_create_servicos_table', 1),
	(11, '2024_08_01_051655_create_profissionals_table', 1),
	(12, '2024_08_01_051951_create_galerias_table', 1),
	(13, '2024_08_05_090044_create_banners_table', 1),
	(14, '2024_08_05_090104_create_contactos_table', 1),
	(17, '2024_09_25_090438_create_horarios_table', 2),
	(18, '2024_10_01_093045_create_testemunhos_table', 3);

-- A despejar estrutura para tabela clispaj.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela clispaj.password_resets: ~0 rows (aproximadamente)

-- A despejar estrutura para tabela clispaj.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela clispaj.personal_access_tokens: ~0 rows (aproximadamente)

-- A despejar estrutura para tabela clispaj.profissionals
CREATE TABLE IF NOT EXISTS `profissionals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela clispaj.profissionals: ~3 rows (aproximadamente)
INSERT INTO `profissionals` (`id`, `nome`, `imagem`, `area`, `status`, `created_at`, `updated_at`) VALUES
	(6, 'Jéssica Pedro', 'imagens/MyLHMq8bGj6xZxojmKD0E980AeCcZ9ScmgLFdHUW.png', 'Radiologista', 'ativado', '2025-09-25 15:11:10', '2025-09-29 11:16:32'),
	(7, 'Biatriz Gonsalvez', 'imagens/2qGL0eXQC5LQGhHWf3UE2psrDd9fEQhvWQWI4YY8.png', 'Dermatologista', 'ativado', '2025-09-25 15:11:42', '2025-09-25 15:11:42'),
	(8, 'Teresa Tavares', 'imagens/xOhzBsRQpWyX114i89emxXSy1GEzGmFtk3dIjOlo.png', 'Cardiologista', 'ativado', '2025-09-25 15:11:56', '2025-09-25 15:11:56'),
	(9, 'Bianca Rosário', 'imagens/FiENj5GHAMFI081ox4FU8kFtWUwvjPTNrAH40YDC.png', 'Odontologista', 'ativado', '2025-09-25 15:12:12', '2025-09-25 15:12:12');

-- A despejar estrutura para tabela clispaj.servicos
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela clispaj.servicos: ~11 rows (aproximadamente)
INSERT INTO `servicos` (`id`, `nome`, `icone`, `imagem`, `descricao`, `status`, `created_at`, `updated_at`) VALUES
	(33, 'Clínica geral', 'imagens/2jCm924LsCOeMqBUlANCyPSHFtua3KEBGHpS5Ehd.png', 'imagens/RrVlPynAY1vw2g89B5aDa0NZPed2fTbF3l9mWNcO.jpg', 'A Clínica Geral é a especialidade médica responsável pelo atendimento integral e contínuo do paciente, avaliando sua saúde de forma global. O clínico geral atua na prevenção, diagnóstico e tratamento de diversas doenças comuns, além de acompanhar casos crônicos e orientar quanto à adoção de hábitos saudáveis.\r\nÉ geralmente o primeiro contato do paciente com o sistema de saúde, realizando consultas, exames de rotina e encaminhando para especialistas quando necessário. O trabalho do clínico geral é essencial para garantir uma visão ampla do estado de saúde, promovendo cuidados que vão desde check-ups regulares até o manejo de condições como hipertensão, diabetes, infecções e distúrbios metabólicos.\r\nCom uma abordagem humanizada, o clínico geral busca entender o histórico, estilo de vida e necessidades de cada paciente, oferecendo um acompanhamento personalizado e contínuo para manter e melhorar a qualidade de vida.', 'ativado', '2025-09-29 09:59:47', '2025-09-29 09:59:47'),
	(34, 'Oftamologia', 'imagens/ewB39gBjAy2RNQYFSyqIODCPNVKP7fGHCEBlsq8G.png', 'imagens/9tUE5UfkEDtQnO9UCOq5MeE8DgjTRddIXcldtAYx.jpg', 'A Oftalmologia é a especialidade da medicina dedicada ao estudo, diagnóstico, prevenção e tratamento das doenças relacionadas aos olhos e à visão. O oftalmologista é o médico responsável por cuidar da saúde ocular em todas as fases da vida, desde a infância até a terceira idade, atuando tanto em problemas simples, como erros refrativos (miopia, hipermetropia, astigmatismo e presbiopia), quanto em condições mais complexas, como catarata, glaucoma, degeneração macular, doenças da retina e infecções oculares.\r\n\r\nAlém dos tratamentos clínicos e cirúrgicos, a oftalmologia também desempenha um papel essencial na prevenção, por meio de exames regulares que permitem detectar alterações precocemente e preservar a qualidade da visão. Com o avanço da tecnologia, a especialidade conta com recursos modernos, como lasers, lentes intraoculares e equipamentos de alta precisão, garantindo diagnósticos mais rápidos e tratamentos cada vez mais eficazes.\r\n\r\nCuidar da visão é fundamental para o bem-estar, a autonomia e a qualidade de vida, e a oftalmologia está na linha de frente desse cuidado', 'ativado', '2025-09-29 10:17:06', '2025-09-29 10:17:06'),
	(35, 'Dermatologia', 'imagens/CTQvzTrdmoQ15ZAsWSMUXZmMxbOGBHGPRXqZaX7h.png', 'imagens/3SMI4kSvYqFlta8T88LZ9k4EVBLqxlQNHpgi9X4z.jpg', 'A Dermatologia é a especialidade médica dedicada ao estudo, diagnóstico, prevenção e tratamento das doenças que afetam a pele, cabelos, unhas e mucosas. Por ser o maior órgão do corpo humano, a pele desempenha funções vitais, como proteção, regulação térmica e sensibilidade, tornando essencial o cuidado especializado.\r\n\r\nO dermatologista é o profissional responsável por identificar condições que vão desde problemas comuns, como acne, queda de cabelo, alergias e micoses, até doenças mais complexas, como psoríase, lúpus e câncer de pele. Além da parte clínica, a dermatologia também abrange a área estética, oferecendo tratamentos voltados para o rejuvenescimento, controle do envelhecimento cutâneo, remoção de manchas, cicatrizes e procedimentos que melhoram a saúde e aparência da pele.\r\n\r\nAssim, a dermatologia alia saúde e estética, promovendo bem-estar, qualidade de vida e confiança aos pacientes, ao mesmo tempo em que desempenha um papel fundamental na detecção precoce de doenças graves.', 'ativado', '2025-09-29 10:24:14', '2025-09-29 10:24:14'),
	(36, 'Otorrinolaringologia', 'imagens/RH3YHwU9MfTc7QuTKJFbStBYlYYZ9s8ch2Kbms5u.png', 'imagens/r60jU1snwM0G1Rw3eD2G5jJ3RqDahW4Kk4sGij2U.jpg', 'Otorrinolaringologia é a especialidade médica responsável pela prevenção, diagnóstico e tratamento das doenças relacionadas ao ouvido, nariz, garganta, laringe e estruturas da face e pescoço. O médico otorrinolaringologista cuida de condições como infecções de ouvido, perda auditiva, zumbido, sinusite, rinite, desvios do septo nasal, distúrbios da voz, dificuldades de deglutição, apneia do sono e distúrbios do equilíbrio, como a vertigem.\r\n\r\nAlém do tratamento clínico, a especialidade também abrange procedimentos cirúrgicos, como correções de desvio de septo, remoção de amígdalas e adenoides, cirurgias da laringe e implantes cocleares.\r\n\r\nPor integrar diferentes áreas – audição, respiração, fala e deglutição – a otorrinolaringologia desempenha um papel fundamental na qualidade de vida dos pacientes, favorecendo funções essenciais do dia a dia e promovendo saúde e bem-estar.', 'ativado', '2025-09-29 10:26:31', '2025-09-29 10:26:31'),
	(37, 'Cirurgia', 'imagens/WyFqN11PGlLJTamIJq0LUAKIWr5Abe1TEg4JWSxh.png', 'imagens/50ZXruV4zl0TaSM8muqSpOzN75fNYZHjV3sYbNDJ.jpg', 'A Cirurgia é uma especialidade da medicina que se dedica ao diagnóstico e tratamento de doenças, lesões, deformidades e condições que requerem intervenção manual ou instrumental no corpo humano. Seu objetivo pode ser curativo, preventivo, reparador ou até mesmo estético.\r\nDentro da cirurgia existem diversas áreas de atuação, como:\r\nCirurgia geral: procedimentos em órgãos abdominais, parede abdominal e glândulas.\r\n\r\nCirurgia plástica: reparação e reconstrução de tecidos, além de fins estéticos.\r\n\r\nCirurgia cardíaca, neurológica, ortopédica, oncológica, entre outras: voltadas a sistemas ou condições específicas.\r\n\r\nO ato cirúrgico pode variar desde procedimentos minimamente invasivos, como laparoscopias e endoscopias, até operações de alta complexidade que exigem tecnologia avançada e equipes multidisciplinares.\r\nAlém do domínio técnico, a cirurgia exige preparo rigoroso, conhecimento profundo de anatomia, fisiologia e patologia, além de cuidados no pré e pós-operatório, sempre visando a segurança e a recuperação plena do paciente.', 'ativado', '2025-09-29 10:32:37', '2025-09-29 10:32:37'),
	(38, 'Medicina Interna', 'imagens/LhXRyqbNoWWXmRZmSyW3breqYUXjHUocCPN9TAjh.png', 'imagens/xrYv1uFfYcjeTYEpLYx3f5qfjm0JvoiioA1YncWv.jpg', 'A Medicina Interna é uma especialidade médica dedicada ao diagnóstico, tratamento e acompanhamento de doenças que afetam os órgãos internos do corpo humano. O médico internista possui uma visão ampla e integrada do paciente, atuando de forma global e abrangente, o que o torna essencial tanto na prevenção quanto na condução de casos clínicos complexos que envolvem múltiplos sistemas do organismo.\r\n\r\nEssa área concentra-se principalmente no cuidado de adultos, abordando desde doenças comuns até condições crônicas e raras, muitas vezes exigindo raciocínio clínico detalhado para identificar causas e propor tratamentos adequados. O internista também desempenha papel fundamental na coordenação do cuidado, orientando quando é necessário encaminhar o paciente para outras especialidades.\r\nAssim, a Medicina Interna se destaca por oferecer uma abordagem humanizada, preventiva e integradora, sendo considerada a base do atendimento médico especializado, com foco na saúde global do paciente e na melhoria da sua qualidade de vida.', 'ativado', '2025-09-29 10:38:16', '2025-09-29 10:38:16'),
	(39, 'Hematologia', 'imagens/syAOQWq9UG6icQHXcQnC7sjOvElXs5yNPdvXP64t.png', 'imagens/jUytGbEPInWNNVoOGoyxzJWXOvCEVZsTQFtKW9bM.jpg', 'A Hematologia é a especialidade médica dedicada ao estudo do sangue, dos órgãos hematopoiéticos (como a medula óssea, linfonodos e baço) e das doenças relacionadas ao sistema hematológico. Ela abrange tanto as condições benignas quanto as malignas, incluindo anemias, distúrbios de coagulação, leucemias, linfomas, mielomas e alterações plaquetárias.\r\n\r\nO hematologista atua no diagnóstico, acompanhamento e tratamento dessas enfermidades, utilizando exames laboratoriais específicos, biópsias, terapias transfusionais, imunoterapias e transplantes de medula óssea, quando necessário. Além disso, desempenha papel fundamental na prevenção e no monitoramento de complicações em pacientes com doenças crônicas ou em tratamento oncológico.\r\n\r\nTrata-se de uma área essencial para a medicina moderna, pois o sangue está diretamente ligado ao funcionamento de todo o organismo, refletindo o estado de saúde geral e servindo como ponto-chave para a detecção precoce de diversas patologias.', 'ativado', '2025-09-29 10:40:50', '2025-09-29 10:40:50'),
	(40, 'Fisioterapia', 'imagens/FkwiC43Mq9l9nIGfRefYoCc6fQYsRjYnxKtarzMV.png', 'imagens/QRWN47VKR3Du5COwoTmhx1ozLFC4XDPPwrPj5bjE.jpg', 'A Fisioterapia é uma área da saúde dedicada à prevenção, diagnóstico e tratamento de distúrbios do movimento e da funcionalidade do corpo humano. Seu principal objetivo é restaurar, manter e promover a capacidade física e funcional dos indivíduos, contribuindo para a melhoria da qualidade de vida.\r\n\r\nO fisioterapeuta atua em diferentes fases do cuidado: desde a reabilitação de lesões musculoesqueléticas, neurológicas, cardiorrespiratórias e pós-cirúrgicas, até o acompanhamento de condições crônicas e o desenvolvimento de programas de prevenção de doenças e promoção da saúde.\r\n\r\nA prática fisioterapêutica utiliza recursos como exercícios terapêuticos, técnicas manuais, eletroterapia, termoterapia, hidroterapia e outros métodos que auxiliam na recuperação e no alívio da dor. Além disso, a fisioterapia pode atuar em áreas especializadas, como ortopedia, neurologia, pediatria, geriatria, esportiva e respiratória.\r\n\r\nEm essência, a fisioterapia é fundamental para devolver autonomia, funcionalidade e bem-estar ao paciente, promovendo um cuidado integral e humanizado.', 'ativado', '2025-09-29 10:42:37', '2025-09-29 10:42:37'),
	(41, 'Ondotologia', 'imagens/FxZWUYIptbXPuSDQBZjyyDMfskf4MHq1enNYbtAt.png', 'imagens/xsH4F12pw6mg40SRGYC5EB2eLirQaS4SCbjGsN7V.jpg', 'Odontologia é a área da saúde dedicada ao estudo, prevenção, diagnóstico e tratamento das doenças e alterações que afetam a boca, os dentes, a gengiva e toda a região bucomaxilofacial. O cirurgião-dentista atua não apenas na estética do sorriso, mas também na preservação da saúde geral do paciente, já que problemas bucais podem impactar diretamente outras funções do organismo.\r\n\r\nA especialidade abrange diferentes áreas, como ortodontia, implantodontia, periodontia, endodontia, odontopediatria, prótese dentária, entre outras, oferecendo cuidados que vão desde a manutenção da higiene oral até procedimentos cirúrgicos complexos.\r\n\r\nMais do que tratar doenças, a odontologia tem um papel fundamental na promoção da qualidade de vida, garantindo bem-estar, autoestima e saúde integral.', 'ativado', '2025-09-29 10:45:14', '2025-09-29 10:45:14'),
	(42, 'Neurologia', 'imagens/R3Dgt1Ifqfcg7FRf1IfjJs6EF3SAOmR2llYXPFL0.png', 'imagens/fTllOSqoelTYlY0tx5QP6MKQUR47OL1gMfvsasTH.jpg', 'A Neurologia é a especialidade médica dedicada ao estudo, diagnóstico e tratamento das doenças que afetam o sistema nervoso central e periférico, incluindo o cérebro, a medula espinhal, os nervos e os músculos. O neurologista atua na investigação de sintomas como dores de cabeça persistentes, tonturas, convulsões, fraqueza muscular, distúrbios de memória, alterações de movimento e sensibilidade.\r\n\r\nEntre as condições mais frequentemente acompanhadas estão epilepsia, esclerose múltipla, acidente vascular cerebral (AVC), doença de Parkinson, Alzheimer, enxaqueca, neuropatias e distúrbios do sono.\r\n\r\nAlém do diagnóstico clínico detalhado, a neurologia utiliza exames complementares como eletroencefalograma (EEG), ressonância magnética, tomografia e estudos de condução nervosa para identificar alterações funcionais e estruturais.', 'ativado', '2025-09-29 10:48:01', '2025-09-29 10:48:01'),
	(43, 'Pediatria', 'imagens/wrdPvOL6eOZ5lM8JBQq7AycLLJEhWcel7Yn3B6Rz.png', 'imagens/2TBYRaylFLR5bUauDCx08CIBgAy62hPUgrWS3MIt.jpg', 'A Pediatria é a especialidade médica dedicada ao cuidado integral da saúde de crianças e adolescentes, desde o nascimento até o fim da adolescência. Seu objetivo principal é promover o crescimento e o desenvolvimento adequados, além de prevenir, diagnosticar e tratar doenças comuns nessa faixa etária.\r\n\r\nO pediatra acompanha o paciente em todas as fases do desenvolvimento, orientando sobre alimentação, vacinação, higiene, comportamento, prevenção de acidentes e hábitos saudáveis. Além disso, atua na detecção precoce de alterações físicas, cognitivas ou emocionais, oferecendo suporte tanto para a criança quanto para sua família.\r\nMais do que tratar doenças, a pediatria tem um papel essencial na promoção da saúde e bem-estar infantil, garantindo que cada criança alcance seu máximo potencial de forma segura e saudável.', 'ativado', '2025-09-29 10:51:26', '2025-09-29 10:51:26');

-- A despejar estrutura para tabela clispaj.subcategorias
CREATE TABLE IF NOT EXISTS `subcategorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `categoria_id` int NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela clispaj.subcategorias: ~21 rows (aproximadamente)
INSERT INTO `subcategorias` (`id`, `categoria_id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Informática', '2024-08-09 08:01:45', '2024-08-09 08:01:45'),
	(2, 1, 'Civil', '2024-08-09 08:01:45', '2024-08-09 08:01:45'),
	(3, 1, 'Mecânica', '2024-08-09 08:01:45', '2024-08-09 08:01:45'),
	(4, 1, 'Industrial E Sistemas Elêctrico', '2024-08-09 08:01:45', '2024-08-09 08:01:45'),
	(5, 1, 'Recursos Naturais E Ambiente', '2024-08-09 08:01:45', '2024-08-09 08:01:45'),
	(6, 2, 'Enfermagem', '2024-08-09 08:01:45', '2024-08-09 08:01:45'),
	(7, 2, 'Nutrição', '2024-08-09 08:01:45', '2024-08-09 08:01:45'),
	(8, 2, 'Fisioterapia', '2024-08-09 08:01:45', '2024-08-09 08:01:45'),
	(9, 2, 'Odontologia', '2024-08-09 08:01:45', '2024-08-09 08:01:45'),
	(10, 2, 'Psicologia', '2024-08-09 08:01:46', '2024-08-09 08:01:46'),
	(11, 2, 'Educação Física', '2024-08-09 08:01:46', '2024-08-09 08:01:46'),
	(12, 3, 'Administração', '2024-08-09 08:01:46', '2024-08-09 08:01:46'),
	(13, 3, 'Economia', '2024-08-09 08:01:46', '2024-08-09 08:01:46'),
	(14, 3, 'Ciências Contábeis', '2024-08-09 08:01:46', '2024-08-09 08:01:46'),
	(15, 3, 'Marketing', '2024-08-09 08:01:46', '2024-08-09 08:01:46'),
	(16, 3, 'Gestão De Recursos Humanos', '2024-08-09 08:01:46', '2024-08-09 08:01:46'),
	(17, 4, 'Matemática', '2024-08-09 08:01:46', '2024-08-09 08:01:46'),
	(18, 4, 'Ciência Da Computação', '2024-08-09 08:01:46', '2024-08-09 08:01:46'),
	(19, 4, 'Banco De Dados', '2024-08-09 08:01:46', '2024-08-09 08:01:46'),
	(20, 4, 'Administração De Redes', '2024-08-09 08:01:46', '2024-08-09 08:01:46'),
	(21, 4, 'Análise E Desenvolvimento De Sistemas', '2024-08-09 08:01:46', '2024-08-09 08:01:46');

-- A despejar estrutura para tabela clispaj.testemunhos
CREATE TABLE IF NOT EXISTS `testemunhos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origem` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela clispaj.testemunhos: ~2 rows (aproximadamente)
INSERT INTO `testemunhos` (`id`, `nome`, `origem`, `descricao`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Francisca Oliveira', 'facebook', 'O atendimento na clínica é excepcional. Desde a recepção até os médicos.', 'ativado', '2024-10-01 09:06:22', '2024-10-01 09:06:22'),
	(2, 'Tiago Oliveira Viola', 'fab fa-instagram', 'Estou muito satisfeito com os serviços da clínica.', 'ativado', '2024-10-01 09:10:51', '2024-10-01 09:10:51');

-- A despejar estrutura para tabela clispaj.testes
CREATE TABLE IF NOT EXISTS `testes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratings` int DEFAULT NULL,
  `reviewCount` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `orders` int DEFAULT NULL,
  `stocks` int DEFAULT NULL,
  `revenue` int DEFAULT NULL,
  `sizes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colors` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colorVariant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacture_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacture_brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela clispaj.testes: ~20 rows (aproximadamente)
INSERT INTO `testes` (`id`, `nome`, `category`, `seller`, `published`, `ratings`, `reviewCount`, `price`, `orders`, `stocks`, `revenue`, `sizes`, `colors`, `description`, `features`, `services`, `images`, `colorVariant`, `manufacture_name`, `manufacture_brand`, `created_at`, `updated_at`) VALUES
	(1, 'aliquid', 'officia', 'voluptas', 'ullam', 1, 1, 2, 5, 4, 5, 'XL', 'Blue', 'ad', 'voluptas', 'in', 'quaerat', 'eveniet', 'ut', 'sequi', '2024-08-09 08:01:46', '2024-08-09 08:01:46'),
	(2, 'iure', 'sint', 'eligendi', 'autem', 3, 3, 1, 4, 5, 2, 'XL', 'Blue', 'quasi', 'dicta', 'est', 'repellendus', 'quia', 'incidunt', 'ullam', '2024-08-09 08:01:46', '2024-08-09 08:01:46'),
	(3, 'cum', 'tempora', 'nulla', 'et', 2, 2, 1, 5, 5, 1, 'XL', 'Blue', 'voluptas', 'temporibus', 'ab', 'veniam', 'dolores', 'non', 'amet', '2024-08-09 08:01:46', '2024-08-09 08:01:46'),
	(4, 'consectetur', 'minima', 'qui', 'eius', 1, 2, 2, 1, 5, 1, 'XL', 'Blue', 'ea', 'itaque', 'autem', 'doloremque', 'perspiciatis', 'eum', 'aut', '2024-08-09 08:01:47', '2024-08-09 08:01:47'),
	(5, 'deserunt', 'odit', 'et', 'eaque', 3, 3, 5, 4, 1, 5, 'XL', 'Blue', 'inventore', 'labore', 'nam', 'aliquid', 'a', 'est', 'autem', '2024-08-09 08:01:47', '2024-08-09 08:01:47'),
	(6, 'dolorem', 'nostrum', 'sunt', 'aut', 5, 1, 2, 3, 2, 4, 'XL', 'Blue', 'amet', 'omnis', 'voluptate', 'consectetur', 'vitae', 'ex', 'porro', '2024-08-09 08:01:47', '2024-08-09 08:01:47'),
	(7, 'deserunt', 'qui', 'eveniet', 'minus', 5, 4, 2, 3, 1, 2, 'XL', 'Blue', 'aliquam', 'repudiandae', 'omnis', 'velit', 'aut', 'deleniti', 'occaecati', '2024-08-09 08:01:47', '2024-08-09 08:01:47'),
	(8, 'commodi', 'et', 'et', 'perferendis', 2, 5, 4, 1, 3, 1, 'XL', 'Blue', 'sed', 'accusantium', 'incidunt', 'quasi', 'quia', 'nihil', 'possimus', '2024-08-09 08:01:47', '2024-08-09 08:01:47'),
	(9, 'molestiae', 'odio', 'omnis', 'quidem', 1, 5, 4, 2, 4, 5, 'XL', 'Blue', 'deleniti', 'perspiciatis', 'nihil', 'est', 'natus', 'maiores', 'blanditiis', '2024-08-09 08:01:47', '2024-08-09 08:01:47'),
	(10, 'eum', 'id', 'nobis', 'modi', 5, 3, 1, 1, 3, 4, 'XL', 'Blue', 'accusantium', 'et', 'ullam', 'explicabo', 'est', 'in', 'et', '2024-08-09 08:01:47', '2024-08-09 08:01:47'),
	(11, 'aperiam', 'dolorum', 'itaque', 'autem', 1, 4, 3, 5, 5, 3, 'XL', 'Blue', 'repellendus', 'et', 'fugit', 'autem', 'est', 'praesentium', 'qui', '2024-08-09 08:01:47', '2024-08-09 08:01:47'),
	(12, 'accusamus', 'similique', 'enim', 'illum', 2, 5, 5, 2, 3, 1, 'XL', 'Blue', 'aliquid', 'ipsam', 'facilis', 'quaerat', 'maiores', 'sed', 'autem', '2024-08-09 08:01:47', '2024-08-09 08:01:47'),
	(13, 'repudiandae', 'consectetur', 'dolor', 'nobis', 5, 4, 1, 3, 2, 5, 'XL', 'Blue', 'et', 'repellendus', 'natus', 'incidunt', 'nihil', 'dolorem', 'facilis', '2024-08-09 08:01:47', '2024-08-09 08:01:47'),
	(14, 'ea', 'fugit', 'dolor', 'perspiciatis', 2, 4, 3, 4, 5, 2, 'XL', 'Blue', 'repellendus', 'dolorem', 'at', 'qui', 'consequatur', 'modi', 'qui', '2024-08-09 08:01:47', '2024-08-09 08:01:47'),
	(15, 'repellat', 'vero', 'est', 'totam', 1, 2, 4, 3, 2, 4, 'XL', 'Blue', 'non', 'repellat', 'id', 'odio', 'soluta', 'reiciendis', 'velit', '2024-08-09 08:01:47', '2024-08-09 08:01:47'),
	(16, 'reiciendis', 'exercitationem', 'voluptatibus', 'explicabo', 4, 3, 3, 4, 1, 3, 'XL', 'Blue', 'perferendis', 'labore', 'quis', 'aliquam', 'ex', 'commodi', 'quis', '2024-08-09 08:01:47', '2024-08-09 08:01:47'),
	(17, 'officiis', 'rerum', 'rem', 'officiis', 4, 5, 2, 4, 4, 5, 'XL', 'Blue', 'atque', 'necessitatibus', 'eaque', 'ad', 'vel', 'porro', 'harum', '2024-08-09 08:01:47', '2024-08-09 08:01:47'),
	(18, 'velit', 'soluta', 'quia', 'atque', 2, 1, 5, 4, 3, 3, 'XL', 'Blue', 'iure', 'rerum', 'nemo', 'vel', 'beatae', 'consectetur', 'sit', '2024-08-09 08:01:47', '2024-08-09 08:01:47'),
	(19, 'qui', 'aspernatur', 'voluptatem', 'non', 2, 1, 3, 5, 4, 4, 'XL', 'Blue', 'dolorum', 'accusamus', 'facilis', 'in', 'consequuntur', 'cumque', 'eius', '2024-08-09 08:01:47', '2024-08-09 08:01:47'),
	(20, 'est', 'non', 'delectus', 'voluptas', 1, 2, 5, 3, 1, 2, 'XL', 'Blue', 'quasi', 'corporis', 'ea', 'nemo', 'beatae', 'rerum', 'a', '2024-08-09 08:01:47', '2024-08-09 08:01:47');

-- A despejar estrutura para tabela clispaj.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela clispaj.users: ~0 rows (aproximadamente)
INSERT INTO `users` (`id`, `foto`, `name`, `telefone`, `email`, `role`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `estado`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Admin', NULL, 'admin@hotmail.com', 'Admin', '2024-08-09 08:01:45', '$2y$10$OFVxHMq5iGhzEH4nDCYouukq7DDhi0jfiIOkFlDULlPpK/d9SPf.u', NULL, NULL, NULL, NULL, '6YtH0sAXuz', '2024-08-09 08:01:45', '2024-08-09 08:01:45');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
