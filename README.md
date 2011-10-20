# Codename "Delivery"

"Delivery" is a micro web app that allows you to quickly show static previews of your web-design work to your clients in the browser, just by simply uploading a few files to your web server.

## Why?

When clients see your work in an actual browser, even if it is a static mock-up, they seem to be able to imagine better how the actual page will work in a browser. From personal experience, I have noticed they even try to click the preview images when they see their first "Delivery". Because they are able to relate better, they provide more constructive feedback -- contrary to delivering static images via e-mail or, I can't believe I'm typing this, in print.

## Known issues

- Analyze $cur\_preview vs. $current\_preview
- Fix filesystem accessibility. Directories are currently unavailable.
- Clean up $p\_fullnames, $p\_filenames into array.
- Fix /_ ([A-Za-z0-9-])