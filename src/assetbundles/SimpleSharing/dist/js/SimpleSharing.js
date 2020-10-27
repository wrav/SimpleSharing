/**
 * SimpleSharing plugin for Craft CMS
 *
 * SimpleSharing JS
 *
 * @author    reganlawton
 * @copyright Copyright (c) 2017 reganlawton
 * @link      https://github.com/wrav
 * @package   SimpleSharing
 * @since     1.0.0
 */

if(window.Craft)

var id = $("input[name='entryId'],input[name='sourceId']").val();
var sectionId = $("input[name='sectionId']").val();

if (id != null) {
    $.ajax({
        type: "GET",
        url: "/actions/simple-sharing/default/url?id=" + id + "&sectionId=" + sectionId,
        async: true
    }).done(function (res) {
        if (res) {
            $('#simple-sharing').remove();

            $("#settings").append(
                '<div id="simple-sharing" class="field" style="margin-top: 50px">' +
                '<div class="heading">' +
                '<label>Share Entry</label>' +
                '</div>' +
                '<div class="input ltr">' +
                res +
                '</div>' +
                '</div>'
            );
        }
    });


}
