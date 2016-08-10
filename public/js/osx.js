/*
 * SimpleModal OSX Style Modal Dialog
 * http://simplemodal.com
 *
 * Copyright (c) 2013 Eric Martin - http://ericmmartin.com
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 */

jQuery(function ($) {
	var OSX = {
		container: null,
		init: function () {
			$("a.osx").click(function (e) {
				e.preventDefault();	
                  
				$("#osx-modal-content").modal({
					overlayId: 'osx-overlay',
					containerId: 'osx-container',
					closeHTML: null,
					minHeight: 408,
					opacity: 65, 
					position: ['0',],
					overlayClose: true,
					onOpen: OSX.open,
					onClose: OSX.close
				});
			});
		},
		open: function (d) {
			var self = this;
			self.container = d.container[0];
			d.overlay.fadeIn('slow', function () {
				$("#osx-modal-content", self.container).show();
				var title = $("#osx-modal-title", self.container);
				title.show();
				d.container.slideDown('slow', function () {
					setTimeout(function () {
						var h = $("#osx-modal-data", self.container).height()
							+ title.height()
							+ 408; // padding
						d.container.animate(
							{height: h}, 
							408,
							function () {
								$("div.close", self.container).show();
								$("#osx-modal-data", self.container).show();
							}
						);
					}, 300);
				});
			})
		},
		close: function (d) {
			var self = this; // this = SimpleModal object
			d.container.animate(
				{top:"-" + (d.container.height() + 20)},
				500,
				function () {
					self.close(); // or $.modal.close();
				}
			);
		}
	};

	OSX.init();

});
jQuery(function ($) {
	var OSX1 = {
		container: null,
		init: function () {
			$("input.osx,a.post").click(function (e) {
				e.preventDefault();	
                  
				$("#osx-modal-content1").modal({
					overlayId: 'osx-overlay',
					containerId: 'osx-container',
					closeHTML: null,
					minHeight: 408,
					opacity: 65, 
					position: ['0',],
					overlayClose: true,
					onOpen: OSX1.open,
					onClose: OSX1.close
				});
			});
		},
		open: function (d) {
			var self = this;
			self.container = d.container[0];
			d.overlay.fadeIn('slow', function () {
				$("#osx-modal-content1", self.container).show();
				var title = $("#osx-modal-title", self.container);
				title.show();
				d.container.slideDown('slow', function () {
					setTimeout(function () {
						var h = $("#osx-modal-data", self.container).height()
							+ title.height()
							+ 408; // padding
						d.container.animate(
							{height: h}, 
							408,
							function () {
								$("div.close", self.container).show();
								$("#osx-modal-data", self.container).show();
								$("#userNamehd").focus();
							}
						);
					}, 300);
				});
			})
		},
		close: function (d) {
			var self = this; // this = SimpleModal object
			d.container.animate(
				{top:"-" + (d.container.height() + 20)},
				500,
				function () {
					self.close(); // or $.modal.close();
				}
			);
		}
	};

	OSX1.init();

});

jQuery(function ($) {
	var OSX2 = {
		container: null,
		init: function () {
			$("div a.osxx").click(function (e) {
				e.preventDefault();	
                  
				$("#osx-modal-content2").modal({
					overlayId: 'osx-overlay',
					containerId: 'osx-container',
					closeHTML: null,
					minHeight: 408,
					opacity: 65, 
					position: ['0',],
					overlayClose: true,
					onOpen: OSX2.open,
					onClose: OSX2.close
				});
			});
		},
		open: function (d) {
			var self = this;
			self.container = d.container[0];
			d.overlay.fadeIn('slow', function () {
				$("#osx-modal-content2", self.container).show();
				var title = $("#osx-modal-title", self.container);
				title.show();
				d.container.slideDown('slow', function () {
					setTimeout(function () {
						var h = $("#osx-modal-data", self.container).height()
							+ title.height()
							+ 408; // padding
						d.container.animate(
							{height: h}, 
							408,
							function () {
								$("div.close", self.container).show();
								$("#osx-modal-data", self.container).show();
							}
						);
					}, 300);
				});
			})
		},
		close: function (d) {
			var self = this; // this = SimpleModal object
			d.container.animate(
				{top:"-" + (d.container.height() + 20)},
				500,
				function () {
					self.close(); // or $.modal.close();
				}
			);
		}
	};

	OSX2.init();

});


jQuery(function ($) {
	var OSX3 = {
		container: null,
		init: function () {
			$("div a.osxxx").click(function (e) {
				e.preventDefault();	
                  
				$("#osx-modal-content3").modal({
					overlayId: 'osx-overlay',
					containerId: 'osx-container',
					closeHTML: null,
					minHeight: 408,
					opacity: 65, 
					position: ['0',],
					overlayClose: true,
					onOpen: OSX3.open,
					onClose: OSX3.close
				});
			});
		},
		open: function (d) {
			var self = this;
			self.container = d.container[0];
			d.overlay.fadeIn('slow', function () {
				$("#osx-modal-content3", self.container).show();
				var title = $("#osx-modal-title", self.container);
				title.show();
				d.container.slideDown('slow', function () {
					setTimeout(function () {
						var h = $("#osx-modal-data", self.container).height()
							+ title.height()
							+ 408; // padding
						d.container.animate(
							{height: h}, 
							408,
							function () {
								$("div.close", self.container).show();
								$("#osx-modal-data", self.container).show();
							}
						);
					}, 300);
				});
			})
		},
		close: function (d) {
			var self = this; // this = SimpleModal object
			d.container.animate(
				{top:"-" + (d.container.height() + 20)},
				500,
				function () {
					self.close(); // or $.modal.close();
				}
			);
		}
	};

	OSX3.init();

});
