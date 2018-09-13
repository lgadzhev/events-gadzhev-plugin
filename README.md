# events-gadzhev-plugin
Simple event listing plugin for Wordpress

**Notes for the plugin:**

- I completed all the requirements for the task except the **Location** picker
with **Google Maps** integration, because to acquire **API_KEY** for it, I need to
connect a credit card for a free trial and decided not to.

- In conclusion, I created a functional plugin with proper **activation/deactivation** and
**deletion** that is also removing the data from the custom fields from the database.

- Activating the plugin adds Events Custom Post Type at the top of the dashboard
allowing you to view/create Events. In addition to the default fields you can see
custom fields for **Date**, **Location** and **URL**. The date field has datepicker implemented
using JQuery and JQuery UI.

- You can list all the events ordered by the date of the event from the *event* archive
page and using the button below them, you can add them to your Google Calendar using the
produced by Google ability to pass the data via GET method.

