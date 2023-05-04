/**
 * Lionite image manager plugin for TinyMCE
 *
 * LICENSE - This software is provded under a commercial license. For sublicensing, modification and distribution
 * of this work, please consult the purchased license for restrictions.
 *
 * @author Eran Galperin
 * @copyright Copyright Lionite LTD. All rights reserved
 */

;(function() {
	tinymce.create('tinymce.plugins.LioniteImages', {
		init : function(ed, url) {
			
			// Register commands
			ed.addCommand('mceLioniteImages', function() {
				var frame = ed.windowManager.open({
					file : url + '/lioniteimages.htm',
					resizable: true,
					maximaziable: true,
					title: "Insert Image"
				}, {
					plugin_url : url
				});
				window.lioniteimages_frame = frame;
				window.lionite_activeEditor = ed;
			});

			// Register buttons
			ed.addButton('lioniteimages', {
				title : 'Lionite Image Manager',
				cmd : 'mceLioniteImages',
				image : url + '/img/icon.png'
			});
		},

		getInfo : function() {
			return {
				longname : 'Lionite Image Manager',
				author : 'Eran Galperin / Lionite',
				authorurl : 'http://www.lionite.com',
				infourl : 'http://demo.lionite.com/imagemanager',
				version : '1.1'
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('lioniteimages', tinymce.plugins.LioniteImages);
})();