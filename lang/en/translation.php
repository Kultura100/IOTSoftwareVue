<?php

return [
    'dashboard' => [
        'routename' => 'Dashboard',
        'transmitterpanel' => [
            'title' => 'Add transmitter',
            'description' => 'This section allows you to add devices actively present in the network whose main task is to collect and transmit information to the receiver.',
            'add' => [
                'fields' => [
                    'name' => 'Transmitter name',
                    'transmitterId' => 'Transmitter code',
                    'receiver_id' => 'Receiver code',
                    'receiver' => 'Pick transmitter',
                ],
                'title' => 'Adding a transmitter',
                'buttontitle' => 'Add device',
            ],
            'edit' => [
                'title' => 'Editing the sensor',
                'buttontitle' => 'Edit device',
            ],
            'info' => [
                'routename' => 'Informations',
                'refresh' => 'Last read:',
                'raining' => 'Raining',
                'optionuna' => 'Option unavailable',
                'yes' => 'Yes',
                'no' => 'No',
                'sunshine' => 'Day',
                'temperature' => 'Temperature 1',
                'temperature2' => 'Temperature 2',
                'humidity' => 'Humidity',
                'tempchart' => 'Temperature Chart',
                'humichart' => 'Humidity Chart',
            ]
        ],
        'receiverpanel' => [
            'title' => 'Add Receiver',
            'description' => 'This section will guide you through the process of configuring and adding a receiver to our system.',
            'add' => [
                'fields' => [
                    'name' => 'Name',
                    'receiverId' => 'Receiver Code',
                ],
                'tutorial' => [
                    'title' => 'How to configure a device',
                    'step1title' => '1. Turn on the receiver.',
                    'step1description' => 'Take any device with the ability to connect to the Wifi network. Find the network named "IOTReceiver" in the wifi list and connect to it with the password "admin".',
                    'step2title' => '2. Start the browser.',
                    'step2description' => 'After connecting to the network, launch the browser and enter the address "192.168.4.1", this is the default configuration address of the device. In the selected fields, enter the login, i.e. SSID and password for your local network at home.',
                    'step3title' => '3. Ready!',
                    'step3description' => 'In order to update the information on the device, disconnect it from the power supply and then connect it. There is an ID on the device. Enter it in the next form.',
                ],
                'title' => 'Adding a receiver',
                'buttontitle' => 'Add device',
                'next' => 'Next step',
            ],
            'edit' => [
                'routename' => 'Editing a device',
                'title' => 'Editing a receiver',
                'buttontitle' => 'Edit device',
            ],
        ],
        'camerapanel' => [
            'routename' => 'Camera editing',
            'empty' => 'No devices added!',
            'title' => 'Add camera',
            'description' => 'The section allows you to add cameras with ip addresses that are actively present in the network.',
            'add' => [
                'fields' => [
                    'name' => 'Camera name',
                    'source' => 'IP',
                    'login' => 'Login',
                    'password' => 'Password',
                    'protocol_id' => 'Protocol',
                    'prot' => 'Pick a protocol',
                    'port' => 'Port',
                ],
                'title' => 'Adding a camera',
                'buttontitle' => 'Add device',
            ],
            'edit' => [
                'title' => "Camera editing",
                'buttontitle' => 'Edit device',
            ],
            'info' => [
                'title' => 'Security clause',
                'description1' => 'For some, it is also necessary to enter the login and password for the camera. Make sure your device has, ',
                'description2' => 'long and difficult password, external IP addresses, e.g. 88.66.55.44',
            ],
            'info2' => [
                'routename' => 'View information from the camera',
                'refresh' => 'Last read:',
                'status' => 'Camera status',
                'params' => 'Camera params',
            ],
        ],
    ],
    'devices' => [
        'empty' => 'No devices added!',
        'routename' => 'Devices',
        'panel' => [
            'types' => [
                'camera' => 'Camera',
                'transmitter' => 'Transmitter',
                'receiver' => 'Receiver',
            ],
            'localiperror' => 'The devices IP address could not be retrieved.',
            'address' => 'Address',
            'addressport' => 'Address:port',
            'protocol' => 'Protocol',
        ],
        'legend' => [
            'title' => 'Caption',
            'green' => 'The device is working properly;',
            'yellow' => 'The device is transmitting data;',
            'red' => 'The device is not responding;',
            'gray' => 'Device status unknown;'
        ],
    ],
    'raports' => [
        'routename' => 'Raports',
        'panel' => [
            'title' => 'List of reports',
            'description' => 'Last refresh:',
        ]
    ],
    'camera' => [
        'routename' => 'Cameras',
    ],
    'tasktable' => [
        'routename' => 'Scheduler',
        'title' => 'Scheduler tasks',
        'add' => [
            'fields' => [
                'type' => 'Action',
                'frequency_function' => 'How often',
                'device_id' => 'Device',
                'options' => [
                    'temperature' => 'Temperature record',
                    'humidity' => 'Humidity record',
                    'alldata' => 'Overall device report',
                    'everyThirtyMinutes' => 'Every 30 minutes',
                    'hourly' => 'Every hour',
                    'everySixHours' => 'Every 6 hours',
                    'daily' => 'Every day',
                    'weekly' => 'Every week',
                    'monthly' => 'Every month',
                    'weeklyOn' => 'Weekly with choice of day and time',
                    'monthlyOn' => 'Monthly with choice of day and time',
                    'day' => 'Day',
                    'dayofmonth' => 'Day of the month',
                    'monday' => 'Monday',
                    'tuesday' => 'Tuesday',
                    'wednesday' => 'Wednesday',
                    'thurdsay' => 'Thursday',
                    'friday' => 'Friday',
                    'saturday' => 'Saturday',
                    'sunday' => 'Sunday',
                    'hour' => 'Hour',
                ]
            ],
            'title' => 'Adding a task to the task schedule',
            'buttontitle' => 'Add a task to the schedule',
        ],
        'types' => [
            'frequency' => 'Frequency:',
            'full' => 'Overall report.',
            'humidity' => 'Humidity measurement report.',
            'temperature' => 'Temperature measurement report.',
            '30min' => 'Report every 30 minutes.',
            'hour' => 'Hourly report.',
            '6hour' => 'Report every 6 hours.',
            'daily' => 'Daily Report.',
            'weekly' => 'Weekly report.',
            'monthly' => 'Monthly report.',
            'custom1' => [
                'description1' => 'Weekly report on',
                'description2' => 'at,',
            ],
            'custom2' => [
                'description1' => 'Monthly report on',
                'description2' => 'at,',
            ],

        ],
    ],
    'contactform' => [
        'routename' => 'Contact',
        'title' => 'Report an error',
        'fields' => [
            'title' => 'Title',
            'description' => 'Description',
            'placeholder' => 'Describe in a few sentences what the error is...',
        ],
        'buttontitle' => 'Send a request',
    ],
    'profile' => [
        'confirmpassword' => [
            'title' => 'Protected section',
            'titletext' => 'This is a secure area of the application. Please confirm your password before continuing.',
            'accept' => 'Confirm',
        ],
        'forgotpassword' => [
            'title' => 'Forgot your password?',
            'description' => 'Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.',
            'reset' => 'Email Password Reset Link',
        ],
        'login' => [
            'title' => 'Log in',
            'rememberme' => 'Remember me',
            'forgot' => 'Forgot your password?',
            'register' => 'Register',
            'login' => 'Log in',
        ],
        'register' => [
            'routename' => 'Register',
            'title' => 'Register',
            'register' => 'Register',
            'accountexists' => 'Already registered?',
            'fields' => [
                'name' => 'Name',
                'email' => 'Email',
                'password' => 'Password',
                'passwordconfirm' => 'Confirm Password',
                'captcha' => 'Captcha verification',
            ],
        ],
        'resetpassword' => [
            'routename' => 'Reset Password',
            'resetpassword' => 'Reset Password',
            'fields' => [
                'email' => 'Email',
                'password' => 'password',
                'passwordconfirm' => 'Confirm Password',
            ],
        ],
        'twofactorchallenge' => [
            'routename' => 'Two-factor Confirmation',
            'title' => 'Please confirm access to your account by entering the authentication code provided by your authenticator application.',
            'titlealter' => 'Please confirm access to your account by entering one of your emergency recovery codes.',
            'recoverycode' => 'Use a recovery code',
            'autorizecode' => 'Use an authentication code',
            'login' => 'Log in',
            'fields' => [
                'code' => 'Code',
                'recoverycode' => 'Recovery Code',
            ],
        ],
        'verifyemail' => [
            'routename' => 'Email Verification',
            'title' => 'Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didnt receive the email, we will gladly send you another..',
            'newlink' => 'A new verification link has been sent to the email address you provided during registration.',
            'buttontitle' => 'Resend Verification Email',
            'editprofile' => 'Edit profile',
            'logout' => 'Log Out',
        ],
    ],
    'messages' => [
        'cameracantconnect' => 'Failed to connect to the camera!',
        'cameraadd' => 'Camera added successfully.',
        'cameralimit' => 'The maximum number of connected cameras has been reached.',
        'cameraedit' => 'Camera edited correctly.',
        'transmitteradd' => 'Sensor added successfully!',
        'transmitter23000' => 'There is already a device with the specified ID.',
        'transmittererror' => 'There was a problem, adding the sensor failed, please try again later!',
        'transmitterlimit' => 'The maximum number of connected sensors has been reached!',
        'raportsend' => 'Your application has been sent to the website administrator!',
        'receiveradd' => 'Receiver successfully added!',
        'receiver23000' => 'The device with the given ID already appears in the system, check if the ID is correct.',
        'receivererror' => 'There was a problem, adding the receiver failed, please try again later!',
        'receiveredit' => 'Receiver edited correctly!',
        'tasktabledelete' => 'Scheduler job successfully deleted!',
        'tasktableadd' => 'The task has been successfully added to the schedule!',
    ],
    'profile2' => [
        'updateprofile' => [
            'header' => 'Profile informations',
            'description' => 'Update your accounts profile information and email address.',
            'newphoto' => 'Select A New Photo',
            'deletephoto' => 'Remove Photo',
            'emailverify' => 'Your email has not been confirmed.',
            'emailsend' => 'Click here to send a verification email.',
            'emailsended' => 'A new account verification link has been sent.',
            'saved' => 'Saved.',
            'save' => 'Save',
            'fields' => [
                'photo' => 'Photo',
                'name' => 'Name',
                'email' => 'Email',
            ]
        ],
        'updatepassword' => [
            'header' => 'Update Password',
            'description' => 'Ensure your account is using a long, random password to stay secure.',
            'saved' => 'Saved.',
            'save' => 'Save',
            'fields' => [
                'current' => 'Current Password',
                'newpassword' => 'New Password',
                'passwordconf' => 'Confirm Password',
            ],
        ],
        'twofactor' => [
            'header' => 'Two Factor Authentication',
            'description' => ' Add additional security to your account using two factor authentication.',
            'twofactoractive' => ' You have enabled two factor authentication.',
            'finishtwofactor' => 'Finish enabling two factor authentication.',
            'twofactoroffline' => 'You have not enabled two factor authentication.',
            'twofactorinfo' => 'When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phones Google Authenticator application.',
            'twofactorstep1' => 'To finish enabling two factor authentication, scan the following QR code using your phones authenticator application or enter the setup key and provide the generated OTP code.',
            'twofactoractivated' => 'Two factor authentication is now enabled. Scan the following QR code using your phones authenticator application or enter the setup key.',
            'twofactorkeys' => 'Setup Key:',
            'code' => 'Code',
            'codes' => 'Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.',
            'start' => 'Enable',
            'accept' => 'Confirm',
            'newcodes' => 'Regenerate Recovery Codes',
            'showcodes' => 'Show Recovery Codes',
            'cancel' => 'Cancel',
            'turnoff' => 'Disable',

        ],
        'logout' => [
            'header' => 'Browser Sessions',
            'description' => ' Manage and log out your active sessions on other browsers and devices.',
            'description2' => ' If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.',
            'thisdevice' => 'This device',
            'activelast' => 'Last active: ',
            'logoutall' => 'Log Out Other Browser Sessions',
            'accepted' => 'Done.',
            'logoutother' => 'Log Out Other Browser Sessions',
            'logoutpassword' => 'Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.',
            'cancel' => 'Cancel',
            'logout' => 'Log Out Other Browser Sessions',
        ],
        'delete' => [
            'header' => 'Delete Account',
            'description' => 'Permanently delete your account.',
            'description2' => 'Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.',
            'deleteacc' => 'Delete Account',
            'deletion' => 'Delete Account',
            'sure' => 'Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.',
            'cancel' => 'Cancel',
            'delete' => 'Delete Account',
        ],
    ],


];
