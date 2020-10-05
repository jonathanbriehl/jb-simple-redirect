# Simple Domain Redirect WordPress Plugin

Redirects to the WordPress Site Address (URL) if the site loads with a different domain.

For example — your WordPress Site Address (URL) is `https://abc123.com` and you also have 
`https://xyz091.com` pointed to your website. When someone requests the `xyz` domain, they will receive a 301 
and be redirected — `http://xyz091.com/sample-post > http://abc123.com/sample-post`.

This will also include the `www` subdomain (or lack thereof). Following the above example, this redirect would occur 
— `http://www.abc123.com/sample-post > http://abc123.com/sample-post`

## How to Install

Download the most recent version of the plugin from the [plugin homepage](https://code.jonathanbriehl.com) or 
from this repository.

In your WordPress administration panel, go to `Plugins`, select `Add New` then `Upload Plugin` to upload the 
zip file. After the upload is complete, click `Activate`.

## How to Use

Activating will automatically enable the redirects. To stop the redirects, deactivate the plugin.