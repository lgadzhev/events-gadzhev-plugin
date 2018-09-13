<h6> <?=get_post_meta(get_the_ID(), 'Date', TRUE)?> </h6>
<h6> <?=get_post_meta(get_the_ID(), 'Location', TRUE)?> </h6>
<h6> <a href="<?=get_post_meta(get_the_ID(), 'URL', TRUE)?>">Link</a> </h6>

<form action="https://www.google.com/calendar/render?" method="GET">
    <input name="action" value="TEMPLATE" type="hidden">
    <input name="text" value=<?=the_title()?> type="hidden">
    <input name="dates" value="<?=date("Ymd\THis\Z", strtotime(get_post_meta(get_the_ID(), 'Date', TRUE)))?>/<?=date("Ymd\THis\Z", strtotime(get_post_meta(get_the_ID(), 'Date', TRUE)))?>" type="hidden">
    <input name="details" value="<?=get_post_meta(get_the_ID(), 'URL', TRUE)?>" type="hidden">
    <input name="location" value="<?=get_post_meta(get_the_ID(), 'Location', TRUE)?>" type="hidden">
    <input name="sf" value="true" type="hidden">
    <input name="output" value="xml" type="hidden">

    <input type="submit" value="Add to Google Calendar">
</form>
