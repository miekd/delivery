# Delivery

Delivery is a micro web-app that allows you to quickly show static previews of your web-design work to your clients in the browser, just by simply uploading a few files to your web server.

## Why?

When clients see your work in an actual browser, even if it is a static mock-up, they seem to be able to imagine better how the actual page will work in a browser. From personal experience, I have noticed they even try to click the preview images when they see their first "Delivery". Because they are able to relate better, they provide more constructive feedback -- contrary to delivering static images via e-mail or, I can't believe I'm typing this, in print.

## Known issues / Nitpicking

- Analyze $cur\_preview vs. $current\_preview
- Fix filesystem accessibility. Directories are currently unavailable.
- Clean up $p\_fullnames, $p\_filenames into array.
- Not a fan of the "/_" in the URL. If anyone has a fix, I'll gladly hear it.

## License

Delivery is licensed under Attribution-NonCommercial-ShareAlike 3.0 Unported (CC BY-NC-SA 3.0).

You are free to use this web-app in whatever-which-way to show your mock-ups to clients, be it at your studio, as a freelancer, or internally. You are NOT allowed to (re-)sell Delivery.