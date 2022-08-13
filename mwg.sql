SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- BD: `mwg`
--

-- --------------------------------------------------------

--
-- tbexercise
--

CREATE TABLE `tbexercise` (
  `exekey` smallint(6) NOT NULL,
  `exedesc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grpkey` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- INSERTS `tbexercise`
--

INSERT INTO `tbexercise` (`exekey`, `exedesc`, `grpkey`) VALUES
(1, 'Bench Press', 1),
(2, 'Dumbell Bench Press', 1),
(3, 'Pullover', 1),
(4, 'Incline Bench Press', 1),
(5, 'Incline Dumbell Bench Press', 1),
(6, 'Decline Bench Press', 1),
(7, 'Decline Dumbell Bench Press', 1),
(8, 'Dumbells Fly', 1),
(9, 'Machine Chest Press', 1),
(10, 'Wide-Grip Pull-Up', 2),
(11, 'Close-Grip Pull-Up', 2),
(12, 'Standing T-Bar Row', 2),
(13, 'Wide-Grip Seated Cable Row', 2),
(14, 'Close-Grip Seated Cable Row', 2),
(15, 'Reverse-Grip Smith Machine Row', 2),
(16, 'Wide-Grip Pull-Down', 2),
(17, 'Close-Grip Pull-Down', 2),
(18, 'Single-Arm Dumbell Row', 2),
(19, 'Bicep Curls', 3),
(20, 'Reverse Curls', 3),
(21, 'Seated Bicep Curls', 3),
(22, 'Preacher Curls', 3),
(23, 'Hammer Curls', 3),
(24, 'Cable Curls', 3),
(25, 'Standing Crossover Cable Biceps Curls', 3),
(26, 'Skullcrushers', 4),
(27, 'Dips', 4),
(28, 'Triceps Kickback', 4),
(29, 'Lying Barbel Triceps Extension', 4),
(30, 'Close Grip Bench Press', 4),
(31, 'Overhead Dumbell Extension', 4),
(32, 'Rope Pushdown', 4),
(33, 'Straight Bar Pushdown', 4),
(34, 'Diamond Pushdowns', 4),
(35, 'Shrugs', 5),
(36, 'Seated Shrugs', 5),
(37, 'Cable Face Pull', 5),
(38, 'Upright Row', 5),
(39, 'Upright Row (Machine)', 5),
(40, 'Dumbell Upright Row', 5),
(41, 'Dumbell Front Raise', 6),
(42, 'Plate Front Raise', 6),
(43, 'Cable Front Raise', 6),
(44, 'Standing Military Press', 6),
(45, 'Front Barbell Raise', 6),
(46, 'Dumbell Side Raise', 7),
(47, 'Cable Side Raise', 7),
(48, 'Unilateral Dumbell Side Raise', 7),
(49, 'Barbell Shoulder Press', 7),
(50, 'Dumbell Shoulder Press', 7),
(51, 'Knee Crunches', 8),
(52, 'Cross Crunches', 8),
(53, 'Leg Raises', 8),
(54, 'Cycles Cross Crunches', 8),
(55, 'Heel Touches', 8),
(56, 'Plank', 8),
(57, 'Superman', 8),
(58, 'Mountain Climbers', 8),
(59, 'Side Lunges', 9),
(60, 'Quadruped Hip Extensions', 9),
(61, 'Standing Kickbacks (Band)', 9),
(62, 'Hip Trhusts', 9),
(63, 'Clamshells', 9),
(64, 'Floor Jack', 9),
(65, 'Single Leg RDL with Hand Support', 10),
(66, 'Barbell Good Morning', 10),
(67, 'Dumbell Good Morning', 10),
(68, 'Good Morning', 10),
(69, 'Cable Leg Curls', 10),
(70, 'Machine Hack Squat', 11),
(71, 'Squat', 11),
(72, 'Front Squat', 11),
(73, 'Dumbell Squat', 11),
(74, 'Leg Press', 11),
(75, 'Barbell Lunge', 11),
(76, 'Dumbell Lunge', 11),
(77, 'Cable Legs Extension', 11),
(78, 'Seated Calv Raise', 12),
(79, 'Cable Calv Raise (standing)', 12),
(80, 'Leg Press Calv Press', 12),
(81, 'Bodyweight Calv Raise', 12);

-- --------------------------------------------------------

--
-- `tbgroup`
--

CREATE TABLE `tbgroup` (
  `grpkey` smallint(6) NOT NULL,
  `grpdesc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- INSERTS `tbgroup`
--

INSERT INTO `tbgroup` (`grpkey`, `grpdesc`) VALUES
(8, 'Abs'),
(2, 'Back'),
(3, 'Biceps'),
(12, 'Calves'),
(1, 'Chest'),
(6, 'Front Delts'),
(9, 'Glutes'),
(10, 'Hamstrings'),
(11, 'Quads'),
(7, 'Side Delts'),
(5, 'Traps'),
(4, 'Triceps');

-- --------------------------------------------------------

--
-- `tblevel`
--

CREATE TABLE `tblevel` (
  `lvlkey` smallint(6) NOT NULL,
  `lvldesc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- INSERTS `tblevel`
--

INSERT INTO `tblevel` (`lvlkey`, `lvldesc`) VALUES
(3, 'Athlete'),
(1, 'Beginner'),
(2, 'Casual'),
(4, 'Pro');

-- --------------------------------------------------------

--
-- `tblog`
--

CREATE TABLE `tblog` (
  `logip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- `tbstimulus`
--

CREATE TABLE `tbstimulus` (
  `stikey` smallint(6) NOT NULL,
  `stidesc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stiexpla` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- INSERTS `tbstimulus`
--

INSERT INTO `tbstimulus` (`stikey`, `stidesc`, `stiexpla`) VALUES
(1, '2 x Drop set', 'All you gotta do is rep till failure, then, you slightly decrease the weight and rep again until you reach complete failure. Remember! Do not rest as you change weights!'),
(2, '3 x Drop set', 'All you gotta do is rep till failure, then, you slightly decrease the weight and rep again until you muscle fails again. Lastly, you will decrease the weight one more time and rep again until you reach complete failure. Remember! Do not rest as you change weights!'),
(3, 'Rest pause', 'You will do the repetitions generated, then, without releasing the weight or leaving the machine, you will rest 10 seconds. After that you will rep again until you reach failure. This count as one set.');

-- --------------------------------------------------------

--
-- `tbworkout`
--

CREATE TABLE `tbworkout` (
  `iwgkey` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iwgseencnt` int(11) NOT NULL,
  `lvlkey` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- INSERTS `tbworkout`
--

INSERT INTO `tbworkout` (`iwgkey`, `iwgseencnt`, `lvlkey`) VALUES
('6KDm5', 1, 4),
('CsaEp', 1, 3),
('dimjY', 1, 1),
('l6BFx', 1, 1),
('LrWp6', 1, 2),
('YIDO6', 1, 1);

-- --------------------------------------------------------

--
-- `tbworkoutexercise`
--

CREATE TABLE `tbworkoutexercise` (
  `iwgkey` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wexeseq` smallint(6) NOT NULL,
  `wexser` smallint(6) NOT NULL,
  `wexrep` smallint(6) NOT NULL,
  `exekey` smallint(6) NOT NULL,
  `stikey` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- INSERTS `tbworkoutexercise`
--

INSERT INTO `tbworkoutexercise` (`iwgkey`, `wexeseq`, `wexser`, `wexrep`, `exekey`, `stikey`) VALUES
('6KDm5', 1, 5, 12, 64, 1),
('6KDm5', 2, 5, 8, 60, NULL),
('6KDm5', 3, 4, 15, 63, NULL),
('6KDm5', 4, 5, 8, 59, NULL),
('6KDm5', 5, 3, 12, 62, NULL),
('6KDm5', 6, 3, 10, 61, NULL),
('6KDm5', 7, 4, 12, 65, NULL),
('6KDm5', 8, 5, 8, 67, NULL),
('6KDm5', 9, 5, 12, 69, NULL),
('6KDm5', 10, 3, 12, 68, NULL),
('6KDm5', 11, 3, 10, 66, NULL),
('CsaEp', 1, 5, 8, 8, NULL),
('CsaEp', 2, 5, 15, 3, NULL),
('CsaEp', 3, 4, 8, 1, NULL),
('CsaEp', 4, 5, 12, 7, NULL),
('CsaEp', 5, 3, 15, 5, NULL),
('CsaEp', 6, 4, 8, 45, NULL),
('CsaEp', 7, 5, 12, 44, NULL),
('CsaEp', 8, 4, 12, 43, NULL),
('CsaEp', 9, 3, 15, 42, 1),
('CsaEp', 10, 5, 15, 41, 1),
('CsaEp', 11, 4, 15, 47, NULL),
('CsaEp', 12, 3, 8, 49, NULL),
('CsaEp', 13, 4, 12, 50, NULL),
('CsaEp', 14, 5, 12, 46, NULL),
('CsaEp', 15, 4, 12, 48, NULL),
('dimjY', 1, 4, 8, 22, NULL),
('dimjY', 2, 4, 8, 24, NULL),
('dimjY', 3, 3, 8, 23, NULL),
('dimjY', 4, 3, 12, 9, NULL),
('dimjY', 5, 3, 10, 5, NULL),
('dimjY', 6, 5, 15, 8, NULL),
('dimjY', 7, 4, 10, 26, NULL),
('dimjY', 8, 4, 10, 34, NULL),
('dimjY', 9, 5, 12, 33, NULL),
('l6BFx', 1, 4, 15, 79, NULL),
('l6BFx', 2, 5, 10, 78, NULL),
('l6BFx', 3, 4, 12, 80, NULL),
('l6BFx', 4, 3, 15, 67, NULL),
('l6BFx', 5, 3, 12, 66, NULL),
('l6BFx', 6, 5, 10, 69, NULL),
('l6BFx', 7, 5, 8, 72, NULL),
('l6BFx', 8, 4, 12, 74, NULL),
('l6BFx', 9, 5, 10, 71, NULL),
('LrWp6', 1, 4, 8, 51, NULL),
('LrWp6', 2, 4, 8, 55, NULL),
('LrWp6', 3, 4, 15, 53, NULL),
('LrWp6', 4, 5, 12, 56, NULL),
('LrWp6', 5, 4, 8, 17, NULL),
('LrWp6', 6, 4, 8, 18, 2),
('LrWp6', 7, 3, 12, 13, NULL),
('LrWp6', 8, 3, 15, 15, NULL),
('LrWp6', 9, 5, 12, 46, NULL),
('LrWp6', 10, 3, 8, 48, NULL),
('LrWp6', 11, 3, 12, 49, NULL),
('LrWp6', 12, 5, 10, 50, NULL),
('YIDO6', 1, 3, 10, 42, NULL),
('YIDO6', 2, 4, 15, 43, NULL),
('YIDO6', 3, 5, 12, 44, NULL),
('YIDO6', 4, 5, 8, 50, NULL),
('YIDO6', 5, 5, 15, 48, NULL),
('YIDO6', 6, 4, 10, 49, NULL),
('YIDO6', 7, 4, 15, 36, NULL),
('YIDO6', 8, 3, 8, 38, NULL),
('YIDO6', 9, 5, 12, 40, NULL);

--
-- INDEXES - `tbexercise`
--
ALTER TABLE `tbexercise`
  ADD PRIMARY KEY (`exekey`),
  ADD UNIQUE KEY `exedesc` (`exedesc`),
  ADD KEY `tbexercise_grpkey_fkey` (`grpkey`);

--
-- INDEXES - `tbgroup`
--
ALTER TABLE `tbgroup`
  ADD PRIMARY KEY (`grpkey`),
  ADD UNIQUE KEY `grpdesc` (`grpdesc`);

--
-- INDEXES - `tblevel`
--
ALTER TABLE `tblevel`
  ADD PRIMARY KEY (`lvlkey`),
  ADD UNIQUE KEY `lvldesc` (`lvldesc`);

--
-- INDEXES - `tblog`
--
ALTER TABLE `tblog`
  ADD PRIMARY KEY (`logip`,`logdate`);

--
-- INDEXES - `tbstimulus`
--
ALTER TABLE `tbstimulus`
  ADD PRIMARY KEY (`stikey`),
  ADD UNIQUE KEY `stidesc` (`stidesc`);

--
-- INDEXES - `tbworkout`
--
ALTER TABLE `tbworkout`
  ADD PRIMARY KEY (`iwgkey`),
  ADD KEY `tbworkout_lvlkey_fkey` (`lvlkey`);

--
-- INDEXES - `tbworkoutexercise`
--
ALTER TABLE `tbworkoutexercise`
  ADD PRIMARY KEY (`iwgkey`,`wexeseq`),
  ADD KEY `tbworkoutexercise_exekey_fkey` (`exekey`),
  ADD KEY `tbworkoutexercise_stikey_fkey` (`stikey`);

--
-- AUTO_INCREMENT `tbexercise`
--
ALTER TABLE `tbexercise`
  MODIFY `exekey` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT `tbgroup`
--
ALTER TABLE `tbgroup`
  MODIFY `grpkey` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT `tblevel`
--
ALTER TABLE `tblevel`
  MODIFY `lvlkey` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT `tbstimulus`
--
ALTER TABLE `tbstimulus`
  MODIFY `stikey` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- FOREIGN KEYS `tbexercise`
--
ALTER TABLE `tbexercise`
  ADD CONSTRAINT `tbexercise_grpkey_fkey` FOREIGN KEY (`grpkey`) REFERENCES `tbgroup` (`grpkey`);

--
-- FOREIGN KEYS `tbworkout`
--
ALTER TABLE `tbworkout`
  ADD CONSTRAINT `tbworkout_lvlkey_fkey` FOREIGN KEY (`lvlkey`) REFERENCES `tblevel` (`lvlkey`);

--
-- FOREIGN KEYS `tbworkoutexercise`
--
ALTER TABLE `tbworkoutexercise`
  ADD CONSTRAINT `tbworkoutexercise_exekey_fkey` FOREIGN KEY (`exekey`) REFERENCES `tbexercise` (`exekey`),
  ADD CONSTRAINT `tbworkoutexercise_iwgkey_fkey` FOREIGN KEY (`iwgkey`) REFERENCES `tbworkout` (`iwgkey`),
  ADD CONSTRAINT `tbworkoutexercise_stikey_fkey` FOREIGN KEY (`stikey`) REFERENCES `tbstimulus` (`stikey`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
