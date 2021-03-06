##Introduction
> Updated and mantained by Qiuxuan Lin


This sections contains some general setup on the server side. Learning to use and deploy an app on Amazon AWS could be a very useful skillset during the process of agile software development.

In our project, the web application is essentially made of four parts:

* A linux machine as host
* Apache server
* MySQL as database
* PHP and python, as well as dlib and OpenCV bindings


In short, this is usually called a LAMP server. In this folder I am presenting mostly tutorials for setting up the forementioned environments. 

* PHP_MySQL

> A pracice and two completed .php file used for mysql-php connection that could connect whatever information stored in mysql database(Witch101) and deliver it to the frontend.




######Getting aroud with AWS and EC2 is always a good starting point. Detailed tutrial is prepared for everyone and for my teammates to quickly get into it. See below:
--------------------------------------------------
###Tutorial for set up EC2
You dont have to know EVERYTHING, it gives a brief explaination of what EC2 is made of.



visit this website for step 1 to 5: https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/get-set-up-for-amazon-ec2.html

visit this website for step 6: https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/EC2_GetStarted.html

1. sign up AWS

2. create Identity and Access Management (IAM) user, it manages login process

3. create key pair, which is used to log into your instance, one key per region

4. create a Virtual Private Cloud (VPC), it manages instance and other components inside AWS

5. create security group through EC2 console, set up who can access your instance

6.  launch instance using the security goup and keys you just set up

7. connect to EC2

   If using windows, use putty to connnect: https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/putty.html

   if using OS, use ssh: https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/AccessingInstancesLinux.html 



##Tutorial for connect EC2, which matters more for everyone


First of all, make sure that the instance is **running**.   If it's turned off no way anyone can connect to it.

**Now, we want the key to be readable and excecutable from your computer, to do this open up your** **terminal**

(*for Windows, use putty, see the above link*)

> $ cd ~/Dropbox/EC500C1/ **I will change this soon**

The key is named "FaceDect.pem" (typo...yeah I know). Use chmod command

> $ chmod 400 FaceDect.pem

Use ***ssh*** to access our EC2 instance

>$ ssh -L 5901:localhost:5901 -i ~/Dropbox/EC500C1/"FaceDect.pem" ubuntu@ec2-54-84-164-103.compute-1.amazonaws.com
**each time EC2 is reboot, "ec2-52-90-32-113.compute-1.amazonaws.com" will change I will let all of you konw the new DNS each time I reboot EC2

Notice that this command has three parts:

- -L 5901:localhost:5901  This is to set up VNC server for the next step.
- your key.pem, make sure the directory is correct
- ubuntu@ec2-54-84-164-103.compute-1.amazonaws.com is the public DNS for our instance. 
**Important: this would change everytime the instance is rebooted. Check up with me if necessary. 
**



###**2. Open VNC viewer on our AWS**

This step is pretty easy, since vnc is configured on this instance. However we may have to install it again when we  create a new instance. Full tutorial is here:


<http://www.brianlinkletter.com/how-to-run-gui-applications-xfce-on-an-amazon-aws-cloud-server-instance/>

For now we only have to type the following command into **the terminal of our instance.**

>vncserver :1

You'll see a ip adress if succesful.

###**3. Get a GUI **

Download the VNC viewer **on your computer**.
<https://www.realvnc.com/download/viewer/>

It is free but need registration.

Install and open up your VNC viewer.

There are two tabs:

>VNC Viewer: localhost:1

>Encrytion: let vnc viewer choose.(it wouldn't matter)

Ignore the security message and our passcode is 

> ok, let's keep it secret

##**Click connect!**

####**4. Finally**

You will be able to see the linux virtual desktop and it is no difference than working on your own! Have fun!

_I will create new instances and try to connect them together.For the time being, I propose that we all use my AWS(Amazon) account- play round, get use to working with EC2'S while we learn to code/web develop._

_This instance has only 8GB and almost 86% is being used. However, I've only **installed python, OpenCV and vncviewer**. We'll figure out if we need to purchase better instances._



