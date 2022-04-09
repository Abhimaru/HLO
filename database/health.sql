-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 01:03 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(100) NOT NULL,
  `User_Name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `User_Email` varchar(40) CHARACTER SET latin1 NOT NULL,
  `Con_Sub` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Con_Text` varchar(255) CHARACTER SET latin1 NOT NULL,
  `User_ID` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `User_Name`, `User_Email`, `Con_Sub`, `Con_Text`, `User_ID`) VALUES
(4, 'bhargav', 'bhalarabhargav@gmail.com', 'regarding all of the error\'s taking place in your system', 'hii', NULL),
(6, 'ABHISHEK', 'abhimaru159000@gmail.com', 'For Testing', 'Hello this is for testing', NULL),
(7, 'Abhi', 'afm2gupi5v@coffeetimer24.com', 'sddbuisig', 'igigiug', 49);

-- --------------------------------------------------------

--
-- Table structure for table `doc_account`
--

CREATE TABLE `doc_account` (
  `Doc_ID` int(255) NOT NULL,
  `Doc_Name` varchar(40) CHARACTER SET latin1 NOT NULL,
  `Doc_Qualification` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Doc_Image` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Doc_Certificate` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Doc_Experience` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Doc_Email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Doc_Address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Doc_Pwd` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Doc_Token` varchar(200) CHARACTER SET latin1 NOT NULL,
  `D_Valid` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_account`
--

INSERT INTO `doc_account` (`Doc_ID`, `Doc_Name`, `Doc_Qualification`, `Doc_Image`, `Doc_Certificate`, `Doc_Experience`, `Doc_Email`, `Doc_Address`, `Doc_Pwd`, `Doc_Token`, `D_Valid`) VALUES
(39, 'abhi_maru', 'BTECH', 'upload/doctor.png', 'upload/desing.PNG', '1 Year', 'abhi@gmail.com', 'Anand', '9b89d949eb43962e3c6d1ac119c3cca3', 'abc393b22f2754c84d322e8d123d01', 'active'),
(42, 'abhishek', 'MBBS', 'upload/doctor.png', 'upload/desing.PNG', '3 Year', 'abhim@gmail.com', 'gffg', '8371f69bdcc49cb926f09c9f4a061082', 'ea47ddaa70b9a0750b24b3eb48103f', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `post_info`
--

CREATE TABLE `post_info` (
  `Post_ID` int(255) NOT NULL,
  `Doc_ID` int(255) DEFAULT NULL,
  `Post_Img` varchar(255) NOT NULL,
  `Post_Head` varchar(200) NOT NULL,
  `Post_Txt` varchar(2000) NOT NULL,
  `P_Created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_info`
--

INSERT INTO `post_info` (`Post_ID`, `Doc_ID`, `Post_Img`, `Post_Head`, `Post_Txt`, `P_Created`) VALUES
(15, NULL, 'upload/Computer Logo.png', 'Corona', '', '2022-04-04 16:30:36'),
(28, 42, 'upload/corona.jpg', 'How to Stay Healthy in corona?', 'Avoid touching your nose, mouth and ears. A healthy diet, rich in immunity-boosting food is crucial at this time, ensure you are getting enough rest and sleep to help your body build immunity. Eat lot of fresh vegetables and citrus fruits like orange mosambi. Avoid alcohol and tobacco products it will decrease immunity.', '2022-04-06 05:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `sym_info`
--

CREATE TABLE `sym_info` (
  `Dis_ID` int(4) NOT NULL,
  `Symptoms` varchar(150) NOT NULL,
  `Dis_name` varchar(255) NOT NULL,
  `Tre_text` varchar(1000) NOT NULL,
  `Dis_text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sym_info`
--

INSERT INTO `sym_info` (`Dis_ID`, `Symptoms`, `Dis_name`, `Tre_text`, `Dis_text`) VALUES
(1, 'sensitivity to touch, light, and sound. Constant movement or being hyper, Short attention span.', 'Autism ', 'Behavioral management therapy, Cognitive behavior therapy, Early intervention, Joint attention therapy, Medication treatment, Nutritional therapy, Occupational therapy', 'Austin also called Austim Spectrum Disorder (ASD), is a complicated condition that includes problems with communication and behavior. ASD can be a minor problem or a disability that needs full-time care in a special facility. People with Austim have trouble with communication. They have trouble understanding what other people think and feel.'),
(2, 'Irritability, lethargy, feeding issues', 'Blue Baby Syndrome', 'Babies with methemoglobinemia can reverse the condition by taking a drug called methylene blue, which can provide oxygen to the blood. This drug needs a prescription and is usually delivered via a needle inserted into a vein.', '3.Blue baby syndrome is a condition some babies are born with or develop early in life. It’s characterized by an overall skin color with a blue or purple tinge, called cyanosis. This bluish appearance is most noticeable where the skin is thin, such as the lips, earlobes, and nail beds. Blue baby syndrome, while not common, can occur due to several congenital (meaning present at birth) heart defects or environmental or genetic factors.'),
(3, 'Shortness of breath, wheezing, bluish appearance, fast breathing, cough', 'Bronchiolitis', 'NO vaccine or specific treatments or drug available. Most cases go away on their own and can be cared for at home. It is key that your child drinks lots of fluids to avoid dehydration.', 'Bronchiolitis is an inflammatory respiratory condition. It’s caused by a virus that affects the smallest air passages in the lungs (bronchioles). The job of the bronchioles is to control airflow in your lungs. When they become infected or damaged, they can swell or become clogged. This blocks the flow of oxygen. Although it’s generally a childhood condition, bronchiolitis can also affect adults.'),
(4, 'Runny or stuffy nose, Sore throat, Cough, Congestion, Slight body aches or a mild headache, Sneezing', 'Common Cold', 'Stay hydrated, Rest, Combat stuffiness, Relieve pain, Sip warm liquids, Try honey, Add moisture to the air', ' The common cold is a viral infection of your nose and throat (upper respiratory tract). It\'s usually harmless, although it might not feel that way. Many types of viruses can cause a common cold. Children younger than 6 are at greatest risk of colds, but healthy adults can also expect to have two or three colds annually. Most people recover from a common cold in a week or 10 days.'),
(7, 'fever, barking cough, heavy breathing, hoarse voice', 'Croup', 'A single dose of dexamethasone (0.15 to 0.60 mg per kg usually given orally) is recommended in all patients with croup, including those with mild disease. Most cases clear up with home care in three to five days.', 'Croup is a viral condition that causes swelling around the vocal cords. It’s characterized by breathing difficulties and a bad cough that sounds like a barking seal. Many of the viruses responsible for croup also cause the common cold. Most active in the fall and winter months, croup usually targets children under the age of 5.'),
(8, 'Runny or stuffy nose, Sneezing, Body aches, Fatigue, Headache, Fever', 'Flu', 'Usually, you\'ll need nothing more than rest and plenty of fluids to treat the flu. But if you have a severe infection or are at higher risk for complications, your doctor may prescribe an antiviral drug to treat the flu. ', 'A common viral infection that can be deadly, especially in high-risk groups. The flu attacks the lungs, nose and throat. Young children, older adults, pregnant women and people with chronic disease or weak immune systems are at high risk.'),
(9, 'Sore throat, fever and swollen lymph nodes in the neck.', 'Strep Throat', 'Treatment is important to reduce complications. Oral antibiotics like penicillin, amoxicillin, cephalexin or azithromycin are commonly used. Other medicines such as acetaminophen or ibuprofen can help with pain and fever.', 'Strep throat is a bacterial infection that causes inflammation and pain in the throat. This common condition is caused by group A Streptococcus bacteria. Strep throat can affect children and adults of all ages.'),
(10, 'Yellow tinge to the skin and the whites of the eyes, Pale stools, Dark urine, Itchiness', 'Jaundice', 'Doctor evaluation is needed to identify the cause.', 'Jaundice is a condition in which the skin, whites of the eyes and mucous membranes turn yellow because of a high level of bilirubin, a yellow-orange bile pigment. Jaundice has many causes, including hepatitis, gallstones and tumors.'),
(11, 'Cough with phlegm or pus, fever, chills and difficulty breathing.', 'Pneumonia', 'Antibiotics can treat many forms of pneumonia. Some forms of pneumonia can be prevented by vaccines.', 'Infection that inflames air sacs in one or both lungs, which may fill with fluid. With pneumonia, the air sacs may fill with fluid or pus. The infection can be life-threatening to anyone, but particularly to infants, children and people over 65.'),
(12, 'Mild fever and headache, eye redness, red rashes, runny nose', 'Rubella', 'There\'s no treatment to get rid of an established infection, but medications may help with symptoms. Vaccination can help prevent the disease.', 'Rubella is a contagious viral infection best known by its distinctive red rash. It\'s also called German measles or three-day measles. While this infection may cause mild symptoms or even no symptoms in most people, it can cause serious problems for unborn babies whose mothers become infected during pregnancy.'),
(13, 'Limited attention, hyperactivity, Aggression, Persistent repetition of words or actions', 'Attention-Deficit/Hyperactivity Disorder (ADHD)', 'Treatments include medication and talk therapy.', 'Attention deficit hyperactivity disorder (ADHD) is a mental health disorder that can cause above-normal levels of hyperactive and impulsive behaviors. People with ADHD may also have trouble focusing their attention on a single task or sitting still for long periods of time.'),
(14, 'Difficulty breathing, chest pain, cough and wheezing.', 'Asthma', 'Asthma can usually be managed with rescue inhalers to treat symptoms (salbutamol) and controller inhalers that prevent symptoms (steroids). Severe cases may require longer-acting inhalers that keep the airways open (formoterol, salmeterol, tiotropium), as well as inhalant steroids.', 'Asthma is a condition in which your airways narrow and swell and may produce extra mucus. This can make breathing difficult and trigger coughing, a whistling sound (wheezing) when you breathe out and shortness of breath.'),
(15, 'Itchy blister-like rash on the skin, Fever, Fatigue', 'Chickenpox', 'Chickenpox can be prevented by a vaccine. Treatment usually involves relieving symptoms, although high-risk groups may receive antiviral medication.', 'A highly contagious viral infection which causes an itchy, blister-like rash on the skin. Chickenpox is highly contagious to those who haven\'t had the disease or been vaccinated against it.'),
(16, 'Chills, fatigue, fever, Diarrhoea , shivering, ', 'Malaria', 'Malaria is treated with prescription drugs to kill the parasite. It involves using different types of anti malarial drugs to treat different parasite and anti bacterial to stop bacterial growth.', 'Malaria is a life-threatening disease. It’s typically transmitted through the bite of an infected Anopheles mosquito. Infected mosquitoes carry the Plasmodium parasite. When this mosquito bites you, the parasite is released into your bloodstream. Once the parasites are inside your body, they travel to the liver, where they mature. After several days, the mature parasites enter the bloodstream and begin to infect red blood cells. Within 48 to 72 hours, the parasites inside the red blood cells multiply, causing the infected cells to burst open. The parasites continue to infect red blood cells, resulting in symptoms that occur in cycles that last two to three days at a time.'),
(17, 'Confusion, seizures and loss of consciousness', 'Reye’s Syndrome', 'It\'s typically treated with hospitalization. In severe cases, children will be treated in the intensive care unit. There\'s no cure for Reye\'s syndrome, so treatment is supportive, focusing on reducing symptoms and complications.', 'Reye\'s (Reye) syndrome is a rare but serious condition that causes swelling in the liver and brain. Reye\'s syndrome most often affects children and teenagers recovering from a viral infection, most commonly the flu or chickenpox.'),
(18, 'red, itchy, or scaly patches, or raised areas of skin called plaques', 'Ring Worm', 'Ringworm of the body can all be treated with topical medications, such as antifungal creams, ointments, gels, or sprays', 'Ringworm, also known as dermatophytosis, dermatophyte infection, or tinea, is a fungal infection of the skin. “Ringworm” is a misnomer, since a fungus, not a worm, causes the infection. The lesion caused by this infection resembles a worm in the shape of a ring — hence the name.'),
(19, 'Vomiting, blue or purple skin around the mouth, dehydration, low-grade fever, breathing difficulties', 'Whooping Cough', 'It is treated with antibiotics, usually erythromycin or a family of antibiotics like erythromycin. Erythromycin is taken for 2 weeks.', 'Whooping cough, also called pertussis, is a serious respiratory infection caused by a type of bacteria called Bordetella pertussis. The infection causes violent, uncontrollable coughing that can make it difficult to breathe. While whooping cough can affect people at any age, it can be deadly for infants and young children.'),
(20, 'Scaly rash that usually causes itching, stinging and burning.', 'Athlete’s Foot', 'Oral antifungal medications such as itraconazole (Sporanox), fluconazole (Diflucan), or prescription-strength terbinafine (Lamisil)', 'Athlete’s foot — also called tinea pedis — is a contagious fungal infection that affects the skin on the feet. It can also spread to the toenails and the hands. The fungal infection is called athlete’s foot because it’s commonly seen in athletes. Athlete’s foot isn’t serious, but sometimes it’s hard to cure.'),
(21, 'Physical deformity, swelling, or bruising', 'Cauliflower Ear', 'Cauliflower ear is permanent, but in some cases, you may be able to reverse the appearance using corrective surgery, known as otoplasty.', 'Cauliflower ear, also known as perichondrial hematoma or wrestler’s ear, is a deformity of the ear caused by trauma.Cauliflower ear occurs when blood pools in your pinna after it’s been hit or struck.'),
(22, 'Headache, fever, stiff neck, loss of appetite\r\n', 'Meningitis', 'Acute bacterial meningitis must be treated immediately with intravenous antibiotics and sometimes corticosteroids. This helps to ensure recovery and reduce the risk of complications, such as brain swelling and seizures. The antibiotic or combination of antibiotics depends on the type of bacteria causing the infection.', 'Meningitis is an inflammation of the meninges. The meninges are the three membranes that cover the brain and spinal cord. Meningitis can occur when fluid surrounding the meninges becomes infected. The most common causes of meningitis are viral and bacterial infections.'),
(23, 'Severe muscle contractions and spasms, Stiffness', 'Neonatal Tetanus', 'NT is a medical emergency requiring hospitalization, immediate treatment with human tetanus immune globulin, agents to control muscle spasm, antibiotics', 'Neonatal tetanus is a form of generalized tetanus that occurs in newborns. Infants who have not acquired passive immunity from the mother having been immunized are at risk. It usually occurs through infection of the unhealed umbilical stump, particularly when the stump is cut with a non-sterile instrument.'),
(24, 'Redness, itching and tearing of the eyes', 'Conjunctivitis', 'It\'s important to stop wearing contact lenses whilst affected by conjunctivitis. It often resolves on its own, but treatment can speed the recovery process. Allergic conjunctivitis can be treated with antihistamines. Bacterial conjunctivitis can be treated with antibiotic eye drops.', 'Conjunctivitis, or pink eye, is an irritation or inflammation of the conjunctiva, which covers the white part of the eyeball. It can be caused by allergies or a bacterial or viral infection. Conjunctivitis can be extremely contagious and is spread by contact with eye secretions from someone who is infected.');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `User_ID` int(255) NOT NULL,
  `User_Name` varchar(40) NOT NULL,
  `User_Email` varchar(40) NOT NULL,
  `User_Pwd` varchar(100) NOT NULL,
  `User_Token` varchar(255) NOT NULL,
  `U_Created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `U_Updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `U_Valid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`User_ID`, `User_Name`, `User_Email`, `User_Pwd`, `User_Token`, `U_Created`, `U_Updated`, `U_Valid`) VALUES
(44, 'bhargav', 'bhalarabhargav@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '8ea6276bdb1e874c74fd1e956391ea', '2021-03-20 05:19:05', '2021-03-13 12:05:42', 'active'),
(46, 'Abhi', '0b45m09mq9@kobrandly.com', 'df8ed725770e25ca30f27173a3b62aef', '1b998a9d416234fd248c5aceb5ec5d', '2022-04-02 10:48:08', '2022-04-02 10:45:20', 'active'),
(49, 'Abhi_123', 'afm2gupi5v@coffeetimer24.com', '5462dc1efd2393b05414a351fc9695a0', '3ab2269416cf5a8c6bc24650f6096e', '2022-04-03 10:10:58', '2022-04-02 11:20:13', 'active'),
(52, 'arin_modi', 'arinmodi2306@gmail.com', 'fb0213a850865d05534223efa052ac46', 'a25c6b03e2c57ef93172ff9e6eb0df', '2022-04-06 06:39:24', '2022-04-06 06:39:24', 'inactive'),
(53, 'arin_123', 'tb5hqkrgn6@popcornfly.com', '0c52b62600f6231d7e381f2ad1674299', 'c117b4c6d9d7ff634e4bcc906f99fa', '2022-04-06 06:39:49', '2022-04-06 06:39:49', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `doc_account`
--
ALTER TABLE `doc_account`
  ADD PRIMARY KEY (`Doc_ID`);

--
-- Indexes for table `post_info`
--
ALTER TABLE `post_info`
  ADD PRIMARY KEY (`Post_ID`),
  ADD KEY `Doc_ID` (`Doc_ID`);

--
-- Indexes for table `sym_info`
--
ALTER TABLE `sym_info`
  ADD PRIMARY KEY (`Dis_ID`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doc_account`
--
ALTER TABLE `doc_account`
  MODIFY `Doc_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `post_info`
--
ALTER TABLE `post_info`
  MODIFY `Post_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sym_info`
--
ALTER TABLE `sym_info`
  MODIFY `Dis_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `User_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user_account` (`User_ID`);

--
-- Constraints for table `post_info`
--
ALTER TABLE `post_info`
  ADD CONSTRAINT `post_info_ibfk_1` FOREIGN KEY (`Doc_ID`) REFERENCES `doc_account` (`Doc_ID`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
