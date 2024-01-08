<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240106193223 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Init database';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employee (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, position VARCHAR(255) NOT NULL, office VARCHAR(255) NOT NULL, age INTEGER NOT NULL, start_date DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , salary DOUBLE PRECISION NOT NULL)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , available_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , delivered_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');

        $this->addSql("INSERT INTO employee (name, position, office, age, start_date, salary) VALUES 
            ('Tiger Nixon', 'System Architect', 'Edinburgh', 61, '2011-04-25', 320800),
            ('Garrett Winters', 'Accountant', 'Tokyo', 63, '2011-07-25', 170750),
            ('Ashton Cox', 'Junior Technical Author', 'San Francisco', 66, '2009-01-12', 86000),
            ('Cedric Kelly', 'Senior Javascript Developer', 'Edinburgh', 22, '2012-03-29', 433060),
            ('Airi Satou', 'Accountant', 'Tokyo', 33, '2008-11-28', 162700),
            ('Brielle Williamson', 'Integration Specialist', 'New York', 61, '2012-12-02', 372000),
            ('Herrod Chandler', 'Sales Assistant', 'San Francisco', 59, '2012-08-06', 137500),
            ('Rhona Davidson', 'Integration Specialist', 'Tokyo', 55, '2010-10-14', 327900),
            ('Colleen Hurst', 'Javascript Developer', 'San Francisco', 39, '2009-09-15', 205500),
            ('Sonya Frost', 'Software Engineer', 'Edinburgh', 23, '2008-12-13', 103600),
            ('Jena Gaines', 'Office Manager', 'London', 30, '2008-12-19', 90560),
            ('Quinn Flynn', 'Support Lead', 'Edinburgh', 22, '2013-03-03', 342000),
            ('Charde Marshall', 'Regional Director', 'San Francisco', 36, '2008-10-16', 470600),
            ('Haley Kennedy', 'Senior Marketing Designer', 'London', 43, '2012-12-18', 313500),
            ('Tatyana Fitzpatrick', 'Regional Director', 'London', 19, '2010-03-17', 385750),
            ('Michael Silva', 'Marketing Designer', 'London', 66, '2012-11-27', 198500),
            ('Paul Byrd', 'Chief Financial Officer (CFO)', 'New York', 64, '2010-06-09', 725000),
            ('Gloria Little', 'Systems Administrator', 'New York', 59, '2009-04-10', 237500),
            ('Bradley Greer', 'Software Engineer', 'London', 41, '2012-10-13', 132000),
            ('Dai Rios', 'Personnel Lead', 'Edinburgh', 35, '2012-09-26', 217500),
            ('Jenette Caldwell', 'Development Lead', 'New York', 30, '2011-09-03', 345000),
            ('Yuri Berry', 'Chief Marketing Officer (CMO)', 'New York', 40, '2009-06-25', 675000),
            ('Caesar Vance', 'Pre-Sales Support', 'New York', 21, '2011-12-12', 106450),
            ('Doris Wilder', 'Sales Assistant', 'Sydney', 23, '2010-09-20', 85600),
            ('Angelica Ramos', 'Chief Executive Officer (CEO)', 'London', 47, '2009-10-09', 1200000),
            ('Gavin Joyce', 'Developer', 'Edinburgh', 42, '2010-12-22', 92575),
            ('Jennifer Chang', 'Regional Director', 'Singapore', 28, '2010-11-14', 357650),
            ('Brenden Wagner', 'Software Engineer', 'San Francisco', 28, '2011-06-07', 206850),
            ('Fiona Green', 'Chief Operating Officer (COO)', 'San Francisco', 48, '2010-03-11', 850000),
            ('Shou Itou', 'Regional Marketing', 'Tokyo', 20, '2011-08-14', 163000),
            ('Michelle House', 'Integration Specialist', 'Sydney', 37, '2011-06-02', 95400),
            ('Suki Burks', 'Developer', 'London', 53, '2009-10-22', 114500),
            ('Prescott Bartlett', 'Technical Author', 'London', 27, '2011-05-07', 145000),
            ('Gavin Cortez', 'Team Leader', 'San Francisco', 22, '2008-10-26', 235500),
            ('Martena Mccray', 'Post-Sales support', 'Edinburgh', 46, '2011-03-09', 324050),
            ('Unity Butler', 'Marketing Designer', 'San Francisco', 47, '2009-12-09', 85675),
            ('Howard Hatfield', 'Office Manager', 'San Francisco', 51, '2008-12-16', 164500),
            ('Hope Fuentes', 'Secretary', 'San Francisco', 41, '2010-02-12', 109850),
            ('Vivian Harrell', 'Financial Controller', 'San Francisco', 62, '2009-02-14', 452500),
            ('Timothy Mooney', 'Office Manager', 'London', 37, '2008-12-11', 136200),
            ('Jackson Bradshaw', 'Director', 'New York', 65, '2008-09-26', 645750),
            ('Olivia Liang', 'Support Engineer', 'Singapore', 64, '2011-02-03', 234500),
            ('Bruno Nash', 'Software Engineer', 'London', 38, '2011-05-03', 163500),
            ('Sakura Yamamoto', 'Support Engineer', 'Tokyo', 37, '2009-08-19', 139575),
            ('Thor Walton', 'Developer', 'New York', 61, '2013-08-11', 98540),
            ('Finn Camacho', 'Support Engineer', 'San Francisco', 47, '2009-07-07', 87500),
            ('Serge Baldwin', 'Data Coordinator', 'Singapore', 64, '2012-04-09', 138575),
            ('Zenaida Frank', 'Software Engineer', 'New York', 63, '2010-01-04', 125250), 
            ('Zorita Serrano', 'Software Engineer', 'San Francisco', 56, '2012-06-01', 115000),
            ('Jennifer Acosta', 'Junior Javascript Developer', 'Edinburgh', 43, '2013-02-01', 75650),
            ('Cara Stevens', 'Sales Assistant', 'New York', 46, '2011-12-06', 145600),
            ('Hermione Butler', 'Regional Director', 'London', 47, '2011-03-21', 356250),
            ('Lael Greer', 'Systems Administrator', 'London', 21, '2009-02-27', 103500),
            ('Jonas Alexander', 'Developer', 'San Francisco', 30, '2010-07-14', 86500),
            ('Shad Decker', 'Regional Director', 'Edinburgh', 51, '2008-11-13', 183000),
            ('Michael Bruce', 'Javascript Developer', 'Singapore', 29, '2011-06-27', 183000),
            ('Donna Snider', 'Customer Support', 'New York', 27, '2011-01-25', 112000)");

        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, quantity INTEGER NOT NULL)');

        $this->addSql("INSERT INTO product (category, name, price, quantity) VALUES
            ('Electronics', 'Smartphone XYZ', 799.99, 50),
            ('Electronics', 'Laptop ABC', 1299.99, 30),
            ('Electronics', 'Tablet High-Tech', 499.99, 20),
            ('Camera', 'Professional 4K Camera', 1599.99, 15),
            ('Audio', 'Wireless Earphones', 129.99, 40),
            ('Audio', 'Smart Speaker', 89.99, 25),
            ('Wearable', 'Smartwatch', 199.99, 35),
            ('3D Printing', '3D Printer', 699.99, 10),
            ('Appliances', 'Coffee Maker', 79.99, 20),
            ('Appliances', 'Robot Vacuum', 299.99, 15),
            ('Sports', 'Fitness Tracker', 49.99, 30),
            ('Sports', 'Indoor Bike', 499.99, 10),
            ('Home Decor', 'Smart Lighting Kit', 129.99, 25),
            ('Home Decor', 'Digital Picture Frame', 149.99, 15),
            ('Gaming', 'Gaming Console', 399.99, 20),
            ('Gaming', 'Gaming Headset', 79.99, 30),
            ('Office', 'Desk Organizer', 29.99, 50),
            ('Office', 'Wireless Mouse', 49.99, 40),
            ('Tools', 'Power Drill', 119.99, 15),
            ('Fashion', 'Smart Sunglasses', 199.99, 25),
            ('Fashion', 'Fitness Apparel', 39.99, 50),
            ('Kitchen', 'Blender', 69.99, 15),
            ('Kitchen', 'Air Fryer', 129.99, 20),
            ('Books', 'Smart Learning Kit', 59.99, 30),
            ('Books', 'Ebook Reader', 119.99, 25),
            ('Automotive', 'Car Dash Cam', 89.99, 30),
            ('Automotive', 'Bluetooth Car Kit', 39.99, 40),
            ('Outdoors', 'Camping Lantern', 29.99, 50),
            ('Outdoors', 'Portable Power Bank', 49.99, 40),
            ('Beauty', 'Facial Cleansing Brush', 29.99, 25),
            ('Beauty', 'Hair Straightener', 69.99, 20),
            ('Pets', 'Smart Pet Feeder', 79.99, 15),
            ('Pets', 'Pet Activity Tracker', 49.99, 30)");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
