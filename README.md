###WARNING: THIS IS A WORK IN PROGRESS, THINGS MAY (AND WILL) GO WRONG###


This little app provides a clean API for Shoutcast1 by converting its XML to JSON.


But that's not it, it also provides some features you may find useful:

1) getting broadcaster (and their guests') information with Twitter.
    Putting your Twitter on AIM section of Shoutcast Yellow Pages will return information from Twitter,
also if you write more than 1 username (comma separated) (ie. "batuhanicoz,pacacican,kaloglu"), this application will
assume first one is the broadcaster and others are guests.

2) Hides IP's of people connected.
    Normally, in (password restricted) XML (ip:port/admin.cgi?mode=viewxml&pass=YOURADMINPASS) there are IP's of the people connected,
this is something you DO want to hide from people. In this application people CAN NOT see IP information unless they provide an API key.

3) You can kick listeners OR the broadcaster.

4) Supports Icecast.
 

This application is originally written for Razyo (http://razyo.com) by using FatFreeFramework, after the acquisition of Razyo by SosyalRadyo,
we needed something more powerful. For these needs we're re-writing (yeah, the biggest mistake!) that application by using Silex.

Note: This application DOES NOT follow any standards (commenting standards etc.), for now.

###Need something ready to go today?###
Then use https://github.com/batuhanicoz/razyo-api-server (note: you need to know Turkish to use files in that repo)