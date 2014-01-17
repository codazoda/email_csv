email_csv
=========

A quick API for gathering email addresses from an HTTP request and writing them
to a CSV file. I use it to capture email addresses from mobile apps.

MailChimp Support
=================

You can also pass the email addresses to MailChimp by adding a mailchimp.ini
file into the same directory as the index.html file. That file should contain
something like the following.

'''
server = "us2"
key = "55555555555555555555555555555555-us2"
list = "abc10abc1a"
'''