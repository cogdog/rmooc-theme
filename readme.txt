### About ###

F8 Lite can transform your site or blog into a fully functioning photography or multimedia portfolio site.

** NOTE: F8 Lite and F8 Static were merged into one theme in 2010 **


### Installation ###

1. Download the zip file from your [members dashboard](https://graphpaperpress.com/dashboard/). This will always be the most current version of the theme.
2. Log in to your WordPress dashboard. This can be found at yourdomain.com/wp-admin
3. Go to Appearance &gt; Themes and click on the *Install Themes* tab
4. Click on the *Upload* link
5. Upload the zip file that you downloaded from your members dashboard and click *Install Now*
6. Click *Activate* to use the theme you just installed.

![installing your Graph Paper Press theme](http://graphpaperpress.s3.amazonaws.com/images/instructions/install_themes.png)

For more details about installing your themes, please view [Installing Your Theme](http://graphpaperpress.com/support/installing-your-theme/)


### Media Settings ###

You will want to change your media settings to ensure that your images are cropped to the correct sizes. You can do this in Settings &gt; Media. 

On this page, change your media settings to:

* Thumbnail size
	** Width: 310
	** Height: 150
	** [checked] Crop thumbnails to exact dimensions (normally thumbnails are proportional)
* Medium size
	** Max Width: 590
	** Max Height: 0
* Large size
	** Max Width: 950
	** Max Height: 0
* Embeds
	** [checked] When possible, embed the media content from a URL directly onto the page. For example: links to Flickr and YouTube.
	** Maximum embed size
		*** Width: 620
		*** Height: 0

*Please Note: If you are switching from another theme, you will want to install and run the [Regenerate Thumbnails](http://wordpress.org/extend/plugins/regenerate-thumbnails/) WordPress plugin to resize your existing images.*


### Theme Customizer ###

With the Theme Customizer, you can set your title and tagline, assign your menus, add fonts, add a background image, and choose a static home page. You can preview your changes by clicking the Customize link below your active theme on your Appearance &gt; Themes page.

*Please note: Setting a static home page will remove the default homepage layout built into the theme. You must keep this set to* Display Latest Posts *to display the homepage options.*


### Theme Options ###

Go to Appearance &gt; Theme Options to add your contact information and assign your slideshow and header settings.

#### Homepage Slideshow ####

You have four options for the homepage slideshow area:

1. Single Header Image: If you select this option, you can upload your header image on the Appearance &gt; Header page. If you enable this option, single posts and pages will display the Featured Image of the post or page, if one has been added. If there is not a featured image for that page, the header image you uploaded will display.
2. Minimalist Slideshow: The slideshow displays the featured images for the five most recent posts. You can choose one or more categories that will display in this slideshow.
3. Overlay Text On Slideshow: The slideshow displays the featured images for the five most recent posts with an overlay that includes the post's title and excerpt. You can choose one or more categories that will display in this slideshow.
4. None: No slideshow or single static image is displayed in the header.

You can choose which categories will display in the slideshow by adding the category ID for each category. Display your list of category IDs in a comma-separated list, for example, 1,4,9. To identify the category ID, go to the Posts > Categories page. Hover your mouse over the category link (or click the link) and the ID will appear in the URL. For example, in the URL:
`http://example.com/wp-admin/edit-tags.php?action=edit&taxonomy=category&tag_ID=1&post_type=post`, the ID can be found in the part `tag_ID=1`, which means the ID is 1.

#### Add a Blog Page ####

You may also want to create a Blog page to display all of your blog posts on your site. To do this, you can create a page called Blog and assign it to the Blog page template. All of your posts in the category designated as your blog category in your theme options will appear on this page.

*Please Note: Do* not *set this page as the page to display your blog posts in Settings > Reading or in the Theme Customizer as this will break the page template's code and your posts will not appear.*


#### Inserting a Gallery into a Post or Page ####

1. Select the Gallery post format.
2. Click the Add Media button to launch the Media Uploader tool.
3. Click the Create Gallery option.
4. You can choose to upload images from your computer or you can use images that already exist in your Media Library. You cannot use an image from a URL on the web in your gallery.
5. If you are uploading images, click the Select Files button and navigate to each of your images on your computer. Click the Open button to open each image.
6. Once each of your images has been uploaded, you will have the option to add a title, caption, alternative text and description.
7. After you have added all of the images you wish to display in the gallery, switch to your media library tab and select those images.
8. Then, click the Create a New Gallery button.
9. Set a featured image for your Gallery.


### Widgets ###

This theme supports widgetized areas. For more detail about adding widgets to your site, please read [Adding Widgets](http://graphpaperpress.com/support/using-widgets/).


### Menus ###

Our themes use WordPress’s custom menus option. These can be created in Appearance > Menus. To add a new menu to your site:

1. Go to Appearance > Menus.
2. Create a new menu item by clicking the + tab.
3. Select the pages you want to display in your menu and click the Add to Menu button. If you do not see the type of page (category, tag, portfolio, gallery, etc) you want to display, click the Screen Options link at the top of the page and make sure the page type is checked.
4. Once you have set your menu as you want it, click the Save Menu button.
5. Then, assign that menu to your desired theme location to ensure your menu appears where you want it and click Save.

![Add a Custom Menu](http://graphpaperpress.s3.amazonaws.com/images/instructions/custom_menu.jpg)


### Always Set Featured Images ###

This theme relies heavily on Featured Images. If your post is missing a Featured Image, the post may not appear on the homepage or on archive pages. 

To choose the image you want to set as a featured image for this post and click the *Set as Featured Image* button. For best results use images that are at least 950 px wide.

![Add a Featured Image](http://graphpaperpress.s3.amazonaws.com/images/instructions/featured_image.png)


### Page Templates ###

This theme provides two page templates: Default and Blog.

1. The Default page template is the standard page layout, and will display the Sidebar if you have it activated in your Theme Options.
2. The Blog page template will display all of your posts on the page. You can determine how many posts will appear on each page before the 'Older Entries' link in Settings &gt; Reading, by setting a value for 'Blog Pages Display at Most'.


### Embed Multimedia into Posts or Pages ###

For externally hosted videos (for example a YouTube or Vimeo video), you can directly paste the link of your video page into the content editor. You do not have to paste the embed code. WordPress will automatically embed the video from the link.

You can easily embed videos from a Video hosting service such as Vimeo or YouTube into your posts or pages.

To add a video:

1. From your WordPress dashboard, add a new post or page (or edit an existing post or page).
2. Paste in your video’s URL, for example https://vimeo.com/31985752.
3. Publish or Update your post or page.

*Please note: If your video is not appearing correctly, remove the ‘s’ from the URL, so https becomes http.*


### Installation Troubleshooting ###
 
If you've performed a clean install of the theme and are still having issues, check the following recommendations:
* Ensure you are using the latest version of both F8 Lite.
* Ensure your file permissions are set correctly. On most servers, the theme files permissions should be set to 644 and folders should be set to 755.
* Ensure your theme folder is named `f8-lite`, with no extra spaces, characters, or uppercase letters. Also ensure that there is not a second folder called `f8-lite` inside the first.
* F8 Lite uses jQuery for much of its functionality. If your theme appears broken or unresponsive, you likely have a JavaScript conflict with one of your plugins. Deactivate **all** of your plugins. If that resolves the issue, reactivate them one at a time until you find the one causing the conflict.

### Theme Internationalization ###

F8 Lite is currently only available in English. It contains a default.pot file which you can use to translate to any other language you want. See [WordPress in Your Language](http://codex.wordpress.org/WordPress_in_Your_Language) for more information about translating your theme into another language.