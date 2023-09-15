In this readme.md file, a detailed explanation of how the project is setup and working is shown with steps. I have tried to explain as throughly as I could for better marks :)

Go to https://sayanassignment.ddns.net to see the website. I haven't played around with it much but if your're into Anime you'll get whose picture it is. 

==============================================================================================================================================================================================================================================================

Lets start by setting up an EC2 as our VPS for this project.
Go to https://aws.amazon.com/ec2/ and click the Get Started with Amazon EC2 button in the orange bar. If you don't already have an AWS account, create one.

Alternatively, go to the EC2 Dashboard and select Launch instance. Look for and install Ubuntu Server 22.04. You may choose any instance type, but to stay within the Free Tier, choose t2.micro.

Continue with the default settings except for the following options:

30 GB more storage
Configure the HTTP Security Group from Anywhere
Configure HTTPS from Anywhere Security Group
Click the launch button, then select Create a new key pair called awsec2 and download the key pair from the prompt. It will be in the form of a pem file.
Don't forget to create a key-pair and download it. Its very important.

Finally, click the Start Instance button.

After a few moments, the Instance state column will show running, indicating that the instance is online and you can move to the next step.

Now, before connecting to you EC2 I'll suggest to link your domain first.
To do that:
I created a free domain from the suggested https://www.noip.com/.
I have setup the domain as a A record to the public ip of my EC2 "3.110.127.12"
Thats all.

Now login to your EC2 via ssh. If you have windows 11 you dont to download a ssh client separately but if you dont then try PuTTy. If your're using PuTTy download the key-pair in .ppk format. For me .pem works.

Go to the folder where you have downloaded the key-pair, and open terminal from there. (type cmd on the path)
In the cmd prompt type: ssh -i "your_key-pair.pem" ubuntu@ec2-3-110-127-12.ap-south-1.compute.amazonaws.com (change the name of the key-pair according to what you have set and downloaded).

Voila!! you are connected to the EC2.

Now, run the follwing commands one by one:

sudo apt update                                                                  #updating (must)
sudo apt upgrade
sudo apt install nginx mariadb-server php-fpm php-mysql                          #Use the apt package manager to install PHP, MariaDB, and the Nginx web server.
cd /var/www
sudo wget https://wordpress.org/latest.tar.gz                                    #Download wordpress
sudo tar -xzvf latest.tar.gz   #Unzip the files 
sudo rm latest.tar.gz
sudo chown -R www-data:www-data wordpress                                        #set user
sudo find wordpress/ -type d -exec chmod 755 {} \;                               #Set neccessary permisions for wordpress to work
sudo find wordpress/ -type f -exec chmod 644 {} \;
sudo mysql_secure_installation                                                   #Install mysql
sudo mysql -u root -p
create database example_db default character set utf8 collate utf8_unicode_ci;   #create and set db, user, password (store it you'll need this while logging in to wordpress)
create user 'example_user'@'localhost' identified by 'example_pw';               
grant all privileges on example_db.* TO 'example_user'@'localhost';
flush privileges;
exit
cd /etc/nginx/sites-available/                                                   #create new config file for your website. Generally people give the name of their website here but for me wordpress just works
sudo nano wordpress.conf                                                         

upstream php-handler {                                                           #Paste this code. But check your php version first. It maybe different. 
        server unix:/var/run/php/php8.1-fpm.sock;
}
server {
        listen 80;
        server_name netwits.io www.netwits.io;
        root /var/www/wordpress;
        index index.php;
        location / {
                try_files $uri $uri/ /index.php?$args;
        }
        location ~ \.php$ {
                include snippets/fastcgi-php.conf;
                fastcgi_pass php-handler;
        }
}

sudo ln -s /etc/nginx/sites-available/wordpress.conf /etc/nginx/sites-enabled/         #Make a symbolic link to tell Nginx about your website, and apply the changes by restarting the web server.
sudo nginx -t
sudo systemctl restart nginx
sudo apt install php-curl php-dom php-mbstring php-imagick php-zip php-gd              #Install necessary php plugins for security and functionality
sudo apt install snapd                                                                 #Install SSL/TLS certs to secure your website
sudo snap install core; snap refresh core
sudo snap install --classic certbot
sudo ln -s /snap/bin/certbot /usr/bin/certbot
sudo certbot --nginx

===========================================================================================================================================================================================================================================



Now to increase the performance of the website I did 2 things:
1. Enabled Leverage Browser Cache in Nginx
2. Gzip Compression in Nginx Web Server

For now this should be enough to increase the performance of the website. 

You can find the browser-cache.conf and gzip.conf in the Snippets folder.

Lastly I included them in my website config file. See wordpress.conf

================================================================================================================================================================================================================================================

For setting up github, I first downloaded git in the system.
To do that run the commands:

sudo apt update
sudo apt install git
git --version

Now you need to set up a repository. I went to the /etc/nginx directory as it has almost all the necessary files and created a repository there. You also need to generate a Personal access token and store it as you will need it in the future.
Generate a Personal access token:
Profile setting => Developer settings => Personal access token => Token classic

Comeback to your EC2, in the /etc/nginx simply run:

Git init    #if it gives Permission denied error run with sudo
git config --global user.name "Your Name"
git config --global user.email "your_email@example.com"
git clone git@github.com:username/repo.git

sudo git add <all the files you need in the directoy>
git commit -m "massage"
sudo git push origin master      #your repositories default branch or any branch you want to upload


For the CI/CD part, honestly, I need help with it. I overthought the process and confused myself. I tried 3 different variations and none of them worked. I have stored the secrets and all but it keeps throwing me 

Host key verification failed.
lost connection
Error: Process completed with exit code 1.

I feel bad :( 
P.S: I think the SSH_PRIVATE_KEY is not working. Or maybe I wrote wrong code. 

The code that is now in the deploy.yml is the last variation, I tried a lot but I'm missing something here. 

Truth is I would love to know and learn what I did wrong and correct it. If you can help me that would be the best. 

===================================================================================================================================================================================================================================================

Thank you so much for the opportunity and I hope I'll hear from you soon. 

Peace out !! Sayan



  
