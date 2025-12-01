var PostPreview = createClass({
    componentDidMount: function() {
      this.updateBodyImages();
    },
    componentDidUpdate: function() {
      this.updateBodyImages();
    },
    updateBodyImages: function() {
      if (!this.bodyContainer || typeof this.props.getAsset !== "function") {
        return;
      }

      var getAsset = this.props.getAsset;
      var images = this.bodyContainer.querySelectorAll("img");

      Array.prototype.forEach.call(images, function(img) {
        var originalSrc = img.getAttribute("data-original-src") || img.getAttribute("src");

        if (!originalSrc) {
          return;
        }

        if (!img.getAttribute("data-original-src")) {
          img.setAttribute("data-original-src", originalSrc);
        }

        if (/^[a-zA-Z]+:\/\//.test(originalSrc)) {
          return;
        }

        var asset = getAsset(originalSrc);
        if (!asset) {
          return;
        }

        var assetUrl = typeof asset.toString === "function" ? asset.toString() : asset;
        if (assetUrl) {
          img.setAttribute("src", assetUrl);
        }
      });
    },
    render: function() {
      var entry = this.props.entry;
      var image = entry.getIn(["data", "image"]);
      var imageAsset = image ? this.props.getAsset(image) : null;
      var imageUrl = imageAsset ? imageAsset.toString() : null;
      var imagePosition = entry.getIn(["data", "imageposition"]) || "50% 50%";
      var altText = entry.getIn(["data", "alt_text"]) || "";
      var title = entry.getIn(["data", "title"]);
      var subtitle = entry.getIn(["data", "subtitle"]);
      var rawDate = entry.getIn(["data", "date"]);
      var slug = entry.get("slug");
      var permalink = entry.getIn(["data", "permalink"]);
      var shareUrl = permalink || (slug ? window.location.origin + "/" + slug + "/" : window.location.href);
      var formattedDate = "";

      if (rawDate) {
        var dateObj = new Date(rawDate);
        if (!isNaN(dateObj.getTime())) {
          formattedDate = dateObj.toLocaleDateString("en-US", {
            month: "long",
            day: "numeric",
            year: "numeric",
          });
        }
      }

      var shareLinks = [
        {
          href: "https://www.linkedin.com/sharing/share-offsite/?url=",
          icon: "/img/icons/social/linkedin.svg",
          alt: "LinkedIn",
        },
        {
          href: "https://www.facebook.com/sharer/sharer.php?u=",
          icon: "/img/icons/social/facebook.svg",
          alt: "Facebook",
        },
        {
          href: "http://twitter.com/share?url=",
          icon: "/img/icons/social/twitter.svg",
          alt: "Twitter",
        },
      ];

      var self = this;
      var bodyWidget = this.props.widgetFor("body");

      return h(
        "main",
        { "data-pagefind-body": true },
        imageUrl
          ? h("section", {
              className: "py-12 py-md-15 bg-cover jarallax",
              style: {
                backgroundImage: "url(" + imageUrl + ")",
                backgroundPosition: imagePosition,
              },
              title: altText,
              "data-jarallax": true,
              "data-speed": ".8",
              "data-img-position": imagePosition,
            })
          : null,
        h(
          "section",
          { className: "pt-8 pt-md-11" },
          h(
            "div",
            { className: "container" },
            h(
              "div",
              { className: "row justify-content-center" },
              h(
                "div",
                { className: "col-12 col-md-10 col-lg-9 col-xl-8" },
                title
                  ? h(
                      "h1",
                      { className: "display-4 text-center" },
                      title
                    )
                  : null,
                subtitle
                  ? h(
                      "p",
                      { className: "lead mb-7 text-center text-muted" },
                      subtitle
                    )
                  : null,
                h(
                  "div",
                  {
                    className:
                      "row align-items-center py-5 px-5 border-top border-bottom",
                  },
                  h(
                    "div",
                    { className: "col ms-n5" },
                    formattedDate
                      ? h(
                          "time",
                          {
                            className: "fs-sm text-muted",
                            dateTime: rawDate,
                          },
                          "Published on " + formattedDate
                        )
                      : null
                  ),
                  h(
                    "div",
                    { className: "col-auto" },
                    h(
                      "span",
                      {
                        className:
                          "h6 text-uppercase text-muted d-none d-md-inline me-4",
                      },
                      "Share:"
                    ),
                    h(
                      "ul",
                      {
                        className:
                          "d-inline list-unstyled list-inline list-social",
                      },
                      shareLinks.map(function (link, index) {
                        return h(
                          "li",
                          {
                            key: link.alt + index,
                            className: "list-inline-item list-social-item me-3",
                          },
                          h(
                            "a",
                            {
                              href: link.href + encodeURIComponent(shareUrl || ""),
                              className: "text-decoration-none",
                              target: "_blank",
                              rel: "noopener noreferrer",
                            },
                            h("img", {
                              src: link.icon,
                              className: "list-social-icon",
                              alt: link.alt,
                            })
                          )
                        );
                      })
                    )
                  )
                )
              )
            )
          )
        ),
        h(
          "section",
          { className: "pt-6 pt-md-8" },
          h(
            "div",
            { className: "container blog-content" },
            h(
              "div",
              { className: "row justify-content-center" },
              h(
                "div",
                {
                  className: "col-12 col-md-10 col-lg-9 col-xl-8",
                  ref: function(el) {
                    self.bodyContainer = el;
                  },
                },
                bodyWidget
              )
            )
          )
        )
      );
    },
});

CMS.registerPreviewTemplate("posts", PostPreview);