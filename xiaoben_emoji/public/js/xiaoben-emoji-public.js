/**
 * @package    Xiaoben_Emoji
 * @subpackage Xiaoben_Emoji
 * @author     小笨
 */
(function ($) {
    function getXiaobenEmojiHtml() {
        let supportEmoji = '_wpemojiSettings' in window && _wpemojiSettings.supports && _wpemojiSettings.supports.everything;
        let emojis = window.xiaoben_emoji_json;

        let html = '<div  class="xiaoben-emoji-list" id="xiaobenEmojiList"><ul>';
        for (let val in emojis) {
            if (Object.prototype.hasOwnProperty.call(emojis, val)) {
                let emoji_img = '<li data-xiaoben-emoji-alt="'+emojis[val]+'"><img src="' + emojis[val] + '"/></li>';
                html += emoji_img;
            }
        }
        html += "</ul></div>";
        return html;
    }

    tinymce.PluginManager.add('xiaoben_emoji_button', function (editor) {
        editor.addButton('xiaoben_emoji_button', {
            type: 'panelbutton',
            panel: {
                classes: 'xiaoben',
                autohide: true,
                html: getXiaobenEmojiHtml,
                onclick: function (e) {
                     let  linkElm = editor.dom.getParent(e.target, 'li');

                      if (linkElm) {
                          editor.insertContent("&nbsp;" +"<img  style='vertical-align: text-bottom;display: inline-block;max-width: 40px;max-height: 40px' src='"+linkElm.getAttribute('data-xiaoben-emoji-alt')+"'</img>" + "&nbsp;");
                          this.hide();
                      }
                }
            },
            tooltip: 'Emoticons'
        });
    });
})(jQuery);
