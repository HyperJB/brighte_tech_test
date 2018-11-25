-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2018 at 08:52 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brighte_tech_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `computer_parts`
--

CREATE TABLE `computer_parts` (
  `id` int(11) NOT NULL,
  `product_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_picture` tinytext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `computer_parts`
--

INSERT INTO `computer_parts` (`id`, `product_name`, `product_price`, `product_description`, `product_picture`) VALUES
(16, 'Intel Core i9 9900K Octa Core LGA 1151 5GHz Unlocked CPU Processor', 899, 'Intel Core i9 9900K Octa Core LGA 1151 5GHz Unlocked CPU Processor - 8 Cores - 16 Threads - Base Frequency: 3.60 GHz Max Turbo Frequency: 5.00 GHz - 16M cache - Intel UHD Graphics 630 - TDP 95W - BX80684I99900K - 3 Years Limited Warranty', 'AC18324.jpg'),
(17, 'Samsung 970 EVO 500GB NVMe 1.3 M.2 (2280) 3D V-NAND SSD - MZ-V7E500BW', 139, 'Samsung 970 EVO 500GB NVMe 1.3 M.2 (2280) 3D V-NAND SSD - Read upto 3,400 MB/s - Write up to 2,300 MB/s - Interface: PCIe Gen 3.0 x4, NVMe 1.3 - Samsung V-NAND 3-bit MLC - Samsung Phoenix Controller - MZ-V7E500BW - 5 Years Limited Warranty or 300 TBW', 'AC13203.jpg'),
(18, 'Samsung 860 Evo 1TB 2.5\" SATA III 6GB/s V-NAND SSD MZ-76E1T0BW', 225, 'Samsung 860 Evo 1TB 2.5\" SATA III 6GB/s V-NAND SSD MZ-76E1T0BW - 1TB 2.5\" 7mm - Sequential Read (Max): 550MB/s - Sequential Write (Max): 520MB/s - 98K/90K IOPS - 600TBW - Samsung MJX Controller - Cache: 1GB Low Power DDR4 SDRAM - SATA III 6GB/s - Samsung V-NAND 3bit MLC - MZ-76E1T0BW - 5 Years Limited Warranty', 'AC11456.jpg'),
(19, 'Corsair Vengeance LPX 32GB (2x 16GB) DDR4 3200MHz Memory', 499, 'Corsair Vengeance LPX 32GB (2x 16GB) DDR4 3200MHz Memory CMK32GX4M2B3200C16 - 288-pin - PC4-25600 (3200MHz) - 16-18-18-36 Latency - 1.35V - Limited Product Lifetime Warranty', 'AB69770_8.jpg'),
(20, 'NZXT H500 Tempered Glass Mid-Tower ATX Case - Matte White', 129, 'NZXT H500 Compact Mid-Tower Case - Matte White - 2+1x 3.5\" Drive bay, 2+1x 2.5\" Drive bay - 7x Expansion slots - Fan Support: 2x 120mm or 2x 140mm (Front), 1x 120mm(1 Aer F120 Case Version included)/140mm (Top), 1x 120mm (Rear, 1x Aer F120 Case Version included) - 2x USB 3.1 Gen 1, 1x Audio/Mic - mini-ITX/mATX/ATX - Tempered Glass Side Panel - Cable Management - 2 Years Limited Warranty', 'AC14014_8.jpg'),
(21, 'Cooler Master MasterLiquid Maker 240 RGB Liquid CPU Cooler Kit', 499, 'Cooler Master MasterLiquid Maker 240 AIO Liquid CPU Cooler Kit - Pure Copper CPU Block - Low Noise Pump-Reservoir Combo - Copper Radiator (with Aluminum Frame) - CPU Socket Compatibility: Intel LGA 2066/2011-v3/2011/1151/1150/1155/1156, AMD AM4/AM3+/AM3/AM2+/AM2/FM2+/FM2/FM1 - Connector: SATA + 4Pin - 2x MasterFan Pro 120mm RGB Fans - 1.2 meters of ID3/8\" OD5/8\" Flexible Tubing - 100mL Pink Coolant - MLZ-N24L-C20PC-R1 - 12 Months Limited', 'AC11698_9.jpg'),
(22, 'Creative Sound Blaster Audigy Rx 7.1 Ch PCI-E Sound Card', 106, 'Creative Sound Blaster Audigy Rx 7.1 Ch PCI-E Sound Card - E-MU Chipset - 3.5mm Headphone Out - Toslink Optical Output - 600-ohm headphone amplifier - 106dB Signal-to-Noise Ratio (SNR) - CRV-70SB155000001', 'AB58962_2.jpg'),
(23, 'Pioneer 15x Internal SATA Retail Blu-Ray Burner Drive BDR-209EBK', 119, 'Pioneer BDR-209EBK BDXL 15x Internal SATA Retail Blu-Ray Burner Drive - Cyberlink BD Suite software', 'AB53394_2.jpg'),
(24, 'SteelSeries Arctis Pro + GameDAC DTS RGB Headset - Black', 349, 'SteelSeries Arctis Pro + GameDAC DTS RGB Headset - Black - Over-Ear - 40mm Neodymium Drivers - 10-40000 Hz - Connectivity Included: GameDAC, Main Headset Cable, USB Audio Cable, Toslink Optical Cable, 4-Pole 3.5mm Adapter - Hi-Res 96 kHz, 24 bit audio support - Audiophile-grade ESS Sabre DAC component - Bidirectional Noise-Canceling Retractable Microphone - DTS Headphone:X v2.0 surround sound - 61453 - 12 Months Limited Warranty', 'AC13092_4.jpg'),
(25, 'Double Up Bundle: LG 27UK850-W 27\" 4K UHD FreeSync IPS LED HDR10 Gaming Monitor', 1708, 'LG 27UK850-W 27\" 4K UHD FreeSync IPS LED HDR10 Gaming Monitor - 3840 x 2160 - Typical Contrast: 1000:1 - Brightness: 350 cd/m2 - Repsonse Time (GTG): 5ms - 2x HDMI (2.0), 1x DisplayPort (1.2), 1x USB3.1 Gen1 PD 60W / DP Alternate Mode / Data, 2x USB 3.0 - Adobe SRGB 99% - 10bit (8bit + A-FRC) - Black Stabiliser - 4 screen split with Split Screen 2.0 - Tilt/Swivel/Pivot adjustable - 3 Years Limited Warranty', 'AC17231_10.jpg'),
(26, 'SteelSeries Sensei Wireless Laser Gaming Mouse', 199, 'SteelSeries Sensei Wireless Laser Gaming Mouse - Sensor Name: Pixart ADNS 9800 - Sensor Type: Laser - CPI: Increments from 1 to 8200 - IPS: 150 - Polling Rate: 1000 Hz - Material: Soft-Touch Black Ambidextrous - Number of Buttons: 8 - Battery Type: Li-ion rechargeable, RPC AE1102338P, 950 mAh, 3.7V - Cable Length: 2 m, 6.5 ft - 12 Months Limited Warranty - 62250', 'AB53254_5.jpg'),
(27, 'ASUS ROG Strix GeForce RTX 2070 OC Edition 8GB Video Card', 999, 'ASUS ROG Strix GeForce RTX 2070 OC edition 8GB Video Card - GGDR6 8GB - Cuda Cores: 2304 - Memory Clock: 14000 MHz - 256-bit - Digital Max Resolution: 7680x4320 - Supports up to 4 Displays - OC Mode; GPU Boost Clock: 1845 MHz, GPU Base Clock: 1410 MHz - Gaming Mode (Default); GPU Boost Clock: 1815 MHz, GPU Base Clock: 1410 MHz - 2x HDMI 2.0B, 2x Display Port 1.4, HDCP Support, 1x USB Type-C - Recommended PSU: 550W - OpenGL 4.5 - ROG-STRIX-RTX2070-O8G-GAMING - 3 Years Limited Warranty', 'AC19164_12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20181125012050'),
('20181125043217');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `computer_parts`
--
ALTER TABLE `computer_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `computer_parts`
--
ALTER TABLE `computer_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
