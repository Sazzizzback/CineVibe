-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 04:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `f cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `link_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `image_url`, `link_url`) VALUES
(1, 'img/ad-img2.png', '#');

-- --------------------------------------------------------

--
-- Table structure for table `movies_tb`
--

CREATE TABLE `movies_tb` (
  `id` int(11) NOT NULL,
  `movie_title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `card_img` varchar(255) DEFAULT NULL,
  `slider_img` varchar(255) DEFAULT NULL,
  `watch_times` int(11) DEFAULT 0,
  `director` varchar(255) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies_tb`
--

INSERT INTO `movies_tb` (`id`, `movie_title`, `description`, `card_img`, `slider_img`, `watch_times`, `director`, `genre`, `publisher`) VALUES
(1, 'Inception', 'Inception follows Dom Cobb, a skilled thief specializing in stealing valuable secrets from deep within the subconscious during the dream state. Cobb is offered a chance to regain his old life in exchange for one last job: performing \"inception,\" or implanting an idea in someone’s mind, rather than stealing one. The task proves dangerous and complex, as Cobb assembles a skilled team and navigates the intricate layers of dreams. As they dive deeper into a multi-layered world where time moves slower, Cobb must confront his past, face deadly obstacles, and resist the lure of endless dreams. The team faces the constant threat of being trapped in limbo, where memories and reality blur, and the stakes rise as Cobb realizes he may lose himself in the process. \"Inception\" is a thrilling blend of action, sci-fi, and psychological drama, exploring profound questions of reality and identity.', 'img/inception_card.jpg', 'img/inception_slider.jpg', 100, 'Christopher Nolan', 'Sci-Fi', 'Warner Bros'),
(2, 'The Godfather', 'The Godfather chronicles the powerful journey of the Corleone family, led by Vito Corleone, a revered Mafia boss with a strict code of loyalty. As he ages, Vito prepares to hand control to his reluctant youngest son, Michael, who initially resists the family business. After a series of betrayals and violent conflicts, Michael gradually becomes embroiled in the criminal underworld, eventually succeeding his father as the family head. This transition marks a profound transformation in Michael’s character—from innocent outsider to ruthless leader. Set amidst rivalries and vendettas, \"The Godfather\" delves deep into themes of family loyalty, power, and moral conflict. Its complex characters, nuanced relationships, and iconic moments make it a cinematic masterpiece. The story serves as both a crime epic and a tragic examination of personal sacrifice, portraying the toll of a life bound by duty and driven by the pursuit of power.', 'img/godfather_card.jpg', 'img/godfather_slider.jpg', 200, 'Francis Ford Coppola', 'Crime', 'Paramount Pictures'),
(3, 'Interstellar', 'Interstellar takes viewers on a cosmic adventure as a group of astronauts embark on a mission to save humanity from a dying Earth. Cooper, a former NASA pilot turned farmer, reluctantly joins a team of scientists on a space journey through a newly discovered wormhole. Their goal: to find a habitable planet for humanity. Leaving his family behind, Cooper faces both the unknowns of space and the profound effects of time dilation, which separates him by decades from those on Earth. With stunning visuals, \"Interstellar\" explores concepts of relativity, love, and sacrifice. The crew faces unique and treacherous planetary environments while struggling to return home before time runs out. As Cooper faces his deepest fears and sacrifices, he uncovers the power of human resilience and connection. \"Interstellar\" combines science fiction with emotional depth, questioning the lengths we will go to protect our future and our loved ones.', 'img/interstellar_card.jpg', 'img/interstellar_slider.jpg', 150, 'Christopher Nolan', 'Adventure', 'Paramount Pictures'),
(4, 'The Matrix', 'The Matrix tells the story of Neo, a hacker who discovers that reality as he knows it is a simulated construct created by sentient machines to control humanity. Neo is chosen by Morpheus, a leader of the human resistance, to break free from the Matrix and help humanity escape their virtual prison. As he trains to develop his powers, Neo uncovers hidden strengths and becomes \"The One\" prophesized to challenge the machines. Combining groundbreaking visuals, intense action sequences, and philosophical undertones, \"The Matrix\" explores themes of free will, choice, and the nature of reality. Neo’s journey reveals the harsh truth about a world manipulated by technology, where perception and reality blur. The film’s iconic bullet-dodging scenes, martial arts choreography, and existential questions set it apart as a visionary sci-fi classic that redefined the genre for generations to come.', 'img/matrix_card.jpg', 'img/matrix_slider.jpg', 300, 'The Wachowskis', 'Sci-Fi', 'Warner Bros'),
(5, 'Pulp Fiction', 'Pulp Fiction follows a series of interconnected stories involving hitmen, gangsters, a boxer, and an array of colorful characters. Vincent Vega and Jules Winnfield, two mob hitmen, perform tasks for their ruthless boss, Marsellus Wallace, but each encounter reveals deeper layers of loyalty, redemption, and fate. Meanwhile, Marsellus’ wife Mia shares an unusual evening with Vincent, and a troubled boxer named Butch seeks revenge, setting a chaotic chain of events into motion. Known for its non-linear narrative and sharp, memorable dialogue, \"Pulp Fiction\" balances intense action with dark humor, exploring the moral ambiguity of its characters. Director Quentin Tarantino’s bold storytelling style, unexpected twists, and engaging soundtrack create an unforgettable viewing experience. The film’s layered structure and unique storytelling push the boundaries of crime dramas, portraying a gritty yet alluring underworld where fate and coincidence intertwine in surprising ways.', 'img/pulpfiction_card.jpg', 'img/pulpfiction_slider.jpg', 250, 'Quentin Tarantino', 'Crime', 'Miramax Films'),
(6, 'The Dark Knight', 'The Dark Knight follows Batman’s struggle to protect Gotham City from a new and deadly threat: the Joker, a chaotic criminal mastermind who spreads terror and challenges Batman’s principles. As Batman, along with allies like Commissioner Gordon and DA Harvey Dent, works to dismantle Gotham’s criminal underworld, the Joker’s unrelenting chaos forces Batman to confront the moral lines he has vowed never to cross. The Joker’s escalating schemes test Batman’s commitment to justice, revealing the dark side of heroism. With complex characters, intense action sequences, and a powerful script, \"The Dark Knight\" delves into themes of justice, order, and sacrifice, raising questions about the cost of heroism. The Joker’s twisted philosophy of chaos and unpredictability leads to unforgettable confrontations that redefine Gotham’s future. Christopher Nolan’s visionary storytelling makes this film an iconic exploration of the blurred line between hero and vigilante.', 'img/darkknight_card.jpg', 'img/darkknight_slider.jpg', 400, 'Christopher Nolan', 'Action', 'Warner Bros'),
(8, 'Avengers: Endgame', 'In the epic conclusion to the Avengers saga, Earth’s mightiest heroes unite one last time to undo the devastation caused by Thanos. As they travel through time and face near-impossible odds, they confront their deepest fears and redefine what it means to be a hero. Endgame showcases stunning action, heartfelt goodbyes, and the strength of friendship and sacrifice, bringing an iconic chapter to a close.', 'img/endgame_card.jpg', 'img/endgame_slider.jpg', 2500, 'Anthony and Joe Russo', 'Action', 'Marvel Studios'),
(9, 'Joker', 'Joker presents an intense character study of Arthur Fleck, a man disregarded by society who transforms into the criminal mastermind known as the Joker. Through haunting performances and a darkly captivating narrative, the film explores themes of mental illness, societal neglect, and the blurred lines between sanity and madness, redefining the classic villain in a uniquely compelling way.', 'img/joker_card.jpg', 'img/joker_slider.jpg', 2300, 'Todd Phillips', 'Crime', 'Warner Bros'),
(10, 'Parasite', 'Parasite is a social thriller that unveils the complex dynamics between two families from different economic backgrounds. As the Kim family infiltrates the lives of the wealthy Parks, their worlds clash in unexpected ways, leading to a shocking twist. With brilliant storytelling, Parasite explores class struggle, human ambition, and the unexpected consequences of deception, earning international acclaim for its originality.', 'img/parasite_card.jpg', 'img/parasite_slider.jpg', 2100, 'Bong Joon Ho', 'Drama', 'CJ Entertainment'),
(11, 'Spider-Man: No Way Home', 'Spider-Man: No Way Home delivers multiverse madness as Peter Parker grapples with the fallout of his double life. When a spell to erase public memory backfires, villains from alternate dimensions emerge, forcing Spider-Man to team up with other versions of himself. This thrilling crossover combines nostalgia, high-stakes action, and the ultimate test of Peter’s growth as a hero.', 'img/no_way_home_card.jpg', 'img/no_way_home_slider.jpg', 2800, 'Jon Watts', 'Action', 'Marvel Studios'),
(12, 'Dune', 'In the distant future, young Paul Atreides must navigate a treacherous landscape as his family inherits control of the desert planet Arrakis, home to a valuable resource known as “spice.” Dune is a visually stunning sci-fi epic that explores themes of destiny, power, and survival, transporting audiences into a world of mysticism, political intrigue, and relentless adventure.', 'img/dune_card.jpg', 'img/dune_slider.jpg', 1950, 'Denis Villeneuve', 'Sci-Fi', 'Warner Bros'),
(13, 'Encanto', 'Encanto introduces the Madrigal family, who possess magical gifts that enrich their small Colombian town. Mirabel, the only non-magical member, uncovers a hidden threat to their magic and embarks on a journey of self-discovery. Encanto is a vibrant, heartfelt animated tale about family, belonging, and the courage to embrace one’s uniqueness.', 'img/encanto_card.jpg', 'img/encanto_slider.jpg', 1800, 'Byron Howard, Jared Bush', 'Drama', 'Disney'),
(14, 'Top Gun: Maverick', 'In this action-packed sequel, Maverick returns to train a new generation of fighter pilots, pushing them to their limits as they prepare for a dangerous mission. With intense aerial sequences and the exploration of legacy, loss, and camaraderie, Top Gun: Maverick honors the spirit of the original film while soaring to new heights.', 'img/top_gun_maverick_card.jpg', 'img/top_gun_maverick_slider.jpg', 2400, 'Joseph Kosinski', 'Action', 'Paramount Pictures'),
(15, 'The Batman', 'In a gritty reimagining, The Batman follows Bruce Wayne during his second year as Gotham’s vigilante. Faced with a rising crime wave and a sinister conspiracy, Batman navigates personal trauma and ethical dilemmas. This noir-inspired crime thriller redefines the Caped Crusader, emphasizing detective work and raw intensity in the fight for justice.', 'img/batman_card.jpg', 'img/batman_slider.jpg', 2200, 'Matt Reeves', 'Crime', 'Warner Bros'),
(18, 'Knives Out', 'In this modern mystery, detective Benoit Blanc is hired to investigate the death of wealthy novelist Harlan Thrombey. As secrets unravel and hidden motives are revealed, Knives Out delivers a clever, engaging whodunit with humor, suspense, and unexpected twists, redefining the classic detective genre.', 'img/knives_out_card.jpg', 'img/knives_out_slider.jpg', 1600, 'Rian Johnson', 'Mystery', 'Lionsgate'),
(19, 'Black Panther: Wakanda Forever', 'In the aftermath of T’Challa’s death, Wakanda faces new threats from both outside forces and internal tensions. Black Panther: Wakanda Forever explores themes of grief, resilience, and legacy as the kingdom rises to defend itself, celebrating the impact of heroes and the enduring power of cultural identity.', 'img/wakanda_forever_card.jpg', 'img/wakanda_forever_slider.jpg', 2400, 'Ryan Coogler', 'Action', 'Marvel Studios'),
(21, 'Minari', 'Minari is a tender, autobiographical drama following a Korean-American family’s move to rural Arkansas in pursuit of the American Dream. The film explores cultural identity, resilience, and family bonds as they navigate challenges and find hope in unfamiliar soil, offering a beautiful and nuanced portrait of the immigrant experience.', 'img/minari_card.jpg', 'img/minari_slider.jpg', 1200, 'Lee Isaac Chung', 'Drama', 'A24'),
(22, 'Free Guy', 'In a virtual world where he’s just an NPC, bank teller Guy gains self-awareness and realizes he has the power to shape his destiny. As he battles against his creators to save his friends, Free Guy delivers action, humor, and a heartfelt message about individuality and breaking free from societal expectations.', 'img/free_guy_card.jpg', 'img/free_guy_slider.jpg', 1800, 'Shawn Levy', 'Comedy', '20th Century Studios'),
(23, 'No Time to Die', 'In “No Time to Die,” Daniel Craig’s James Bond returns in an explosive finale where his past confronts his present in unexpected ways. Bond has left active service, but peace eludes him when an old friend from the CIA turns up asking for help. This time, he faces a villain wielding dangerous new technology that threatens millions. Set across multiple continents, with breathless action sequences and exotic locales, Bond’s mission becomes deeply personal. As Bond fights to protect those he loves, he confronts his own vulnerabilities and regrets, humanizing the seemingly indestructible spy. This film is both a thrilling ride and a profound character study, blending classic Bond elements with emotional weight, marking an unforgettable close to Craig’s era.', 'img/no_time_to_die_card.jpg', 'img/no_time_to_die_slider.jpg', 2100, 'Cary Joji Fukunaga', 'Action', 'MGM Studios'),
(24, 'Doctor Strange in the Multiverse of Madness', 'In “Doctor Strange in the Multiverse of Madness,” Marvel fans are transported into strange new dimensions as Doctor Strange navigates the perils of the multiverse. After tampering with reality, Strange encounters alternate versions of himself and teams up with Wanda Maximoff, aka Scarlet Witch, who is on her own tumultuous path. As they journey through surreal landscapes, they uncover a threat that could upend all realities. Combining action, horror, and thrilling visuals, this film explores the limits of magic, identity, and sacrifice, as Strange confronts not only external dangers but the darkest corners of his own psyche. Under Sam Raimi’s direction, the movie introduces supernatural and psychological themes into the MCU, creating an unforgettable, high-stakes adventure that pushes boundaries.', 'img/dr_strange_multiverse_card.jpg', 'img/dr_strange_multiverse_slider.jpg', 2300, 'Sam Raimi', 'Sci-Fi', 'Marvel Studios'),
(25, 'Don’t Look Up', 'In “Don’t Look Up,” two scientists face the ultimate test: convincing a skeptical world that a comet is on a collision course with Earth. Despite the imminent catastrophe, society’s leaders, media, and the public remain indifferent or distracted by trivial concerns, highlighting how modern culture handles global crises. As they navigate a chaotic media circuit and face absurd political challenges, the scientists become frustrated, showcasing a blend of satire and dark comedy. The film tackles themes of misinformation, denial, and humanity’s response to existential threats. With sharp wit and timely commentary, “Don’t Look Up” critiques modern society’s tendency to ignore inconvenient truths. This thought-provoking and entertaining satire sparks reflection on real-world issues, blending humor with urgency in a memorable narrative.', 'img/dont_look_up_card.jpg', 'img/dont_look_up_slider.jpg', 1750, 'Adam McKay', 'Comedy', 'Netflix'),
(26, 'The Northman', 'In “The Northman,” an epic Viking tale unfolds as young Prince Amleth seeks vengeance for his father’s brutal murder by his uncle, who has seized the throne. Driven by honor and rage, Amleth’s journey is a raw, violent exploration of Norse culture, steeped in mysticism and primal themes. His path to revenge is relentless, marked by brutal combat, trials of loyalty, and ancient rites that test his resolve. Set in a stark, icy landscape, the film combines epic battles with a spiritual undercurrent, portraying both the physical and psychological challenges faced by warriors. Directed by Robert Eggers, this film immerses viewers in Viking lore and symbolism, blending historical realism with supernatural elements, creating a visceral, immersive experience.', 'img/the_northman_card.jpg', 'img/the_northman_slider.jpg', 1400, 'Robert Eggers', 'Action', 'Focus Features'),
(27, 'Turning Red', '“Turning Red” follows 13-year-old Mei, who suddenly finds herself turning into a giant red panda whenever she feels intense emotions—a family trait connected to her ancestors. As Mei struggles with her transformation, she faces the universal challenges of adolescence, from friendship conflicts to parental expectations. This heartwarming animated story is set in early 2000s Toronto, blending cultural heritage with themes of individuality, acceptance, and the ups and downs of growing up. Director Domee Shi crafts a colorful world where Mei’s journey is both personal and universal, resonating with anyone who has felt the push and pull of family and self-discovery. “Turning Red” celebrates the messiness of teenage life with humor, heart, and a unique cultural perspective, making it a beloved Pixar film.', 'img/turning_red_card.jpg', 'img/turning_red_slider.jpg', 1600, 'Domee Shi', 'Comedy', 'Pixar'),
(28, 'The Menu', 'In “The Menu,” a young couple embarks on an exclusive culinary journey at a secluded island restaurant known for its avant-garde dishes. However, what begins as an extravagant experience takes a sinister turn as each course reveals disturbing truths about the chef and his motivations. As the evening progresses, guests are subjected to psychological games that challenge their morals and relationships. Blending suspense with social critique, “The Menu” explores themes of privilege, indulgence, and the often-unquestioned power dynamics in fine dining. With clever writing and an unpredictable storyline, the film holds viewers captive as it satirizes the high-stakes world of gourmet cuisine and exposes the hidden costs of luxury. It’s a thrilling, darkly comedic experience.', 'img/the_menu_card.jpg', 'img/the_menu_slider.jpg', 900, 'Mark Mylod', 'Action', 'Searchlight Pictures');

-- --------------------------------------------------------

--
-- Table structure for table `reviews_tb`
--

CREATE TABLE `reviews_tb` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `reviewer_name` varchar(100) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `review_text` text DEFAULT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews_tb`
--

INSERT INTO `reviews_tb` (`id`, `movie_id`, `reviewer_name`, `rating`, `review_text`, `review_date`, `user_id`) VALUES
(35, 2, 'user1', 5, 'final test by user 1', '2024-12-01 14:31:17', 23),
(36, 6, 'my', 3, 'final review test', '2024-12-02 02:57:58', 24);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `created_at`) VALUES
(23, 'user1', '', 'user1', 'test@gmail.com', '$2y$10$79NdtoC/b.syVIYvEb85Du32lvOYYX6ZcUey00MOne5.g1cs4B9U.', '2024-12-01 13:40:12'),
(24, 'my', 'name', 'ispraj', 'ispraj@gmail.com', '$2y$10$wCFAknE.9wDAXeNflhoFJeUqQiUi1dgLn6kktzUVCgrY9Pnpy0H42', '2024-12-02 02:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_tb`
--

CREATE TABLE `wishlist_tb` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist_tb`
--

INSERT INTO `wishlist_tb` (`wishlist_id`, `user_id`, `movie_id`, `added_on`) VALUES
(9, 23, 11, '2024-12-01 13:42:11'),
(10, 24, 6, '2024-12-02 02:57:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies_tb`
--
ALTER TABLE `movies_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews_tb`
--
ALTER TABLE `reviews_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist_tb`
--
ALTER TABLE `wishlist_tb`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movies_tb`
--
ALTER TABLE `movies_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `reviews_tb`
--
ALTER TABLE `reviews_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `wishlist_tb`
--
ALTER TABLE `wishlist_tb`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews_tb`
--
ALTER TABLE `reviews_tb`
  ADD CONSTRAINT `reviews_tb_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies_tb` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
