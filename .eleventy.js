const { DateTime } = require("luxon");

module.exports = function(eleventyConfig) {
    eleventyConfig.addPassthroughCopy('./src/css/');
    eleventyConfig.addPassthroughCopy('./src/img/');
    eleventyConfig.addPassthroughCopy('./src/js/');
    eleventyConfig.addPassthroughCopy('./src/lib/');
    eleventyConfig.addPassthroughCopy('./src/scss/');
    eleventyConfig.addPassthroughCopy('./src/downloads/');
    eleventyConfig.addPassthroughCopy('./src/admin/');

    eleventyConfig.addFilter("postDate", (dateObj) => {
        return DateTime.fromJSDate(dateObj).toLocaleString(DateTime.DATE_MED);
      });

	return {
    pathPrefix: "/", // For local development
    markdownTemplateEngine: "njk",
        dir: {
            input: "src",
            output: "public"
          }
    };
 
}