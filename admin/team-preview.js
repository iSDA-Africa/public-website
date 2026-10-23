var TeamPreview = createClass({
  openProfile: function(event) {
    event.preventDefault();
    if (this.dialog && !this.dialog.open) {
      this.dialog.showModal();
    }
  },
  closeProfile: function() {
    if (this.dialog) {
      this.dialog.close();
    }
  },
  render: function() {
    var self = this;
    var entry = this.props.entry;
    var name = entry.getIn(["data", "name"]) || "Team member name";
    var title = entry.getIn(["data", "title"]) || "Job title";
    var board = entry.getIn(["data", "team"]) === "board";
    var role = board
      ? (entry.getIn(["data", "chair"]) ? "Board Chair" : "Board Member")
      : title;
    var bio = entry.getIn(["data", "bio"]) || "The biography will appear here.";
    var image = entry.getIn(["data", "img"]) || "/img/team/team-placeholder.jpg";
    var asset = typeof this.props.getAsset === "function" ? this.props.getAsset(image) : null;
    var imageUrl = asset ? (asset.url || asset.toString()) : image;

    return h("main", { className: "team-preview" },
      h("h1", { className: "h3 mb-3" }, "Profile preview"),
      h("p", { className: "text-muted mb-5" },
        "Hover over the card to see the name and role. Select it to open the full profile."
      ),
      h("a", {
        className: "card shadow-light-lg team-preview__card",
        href: "#team-profile-preview",
        onClick: this.openProfile,
        "aria-haspopup": "dialog",
        "aria-label": "View profile for " + name
      },
        h("div", { className: "card-zoom" },
          h("img", { src: imageUrl, alt: name, className: "card-img" })
        ),
        h("div", { className: "card-img-overlay card-img-overlay-hover" },
          h("div", { className: "card-body bg-white" },
            h("div", { className: "shape shape-bottom-100 shape-fluid-x text-white" },
              h("svg", { viewBox: "0 0 2880 48", fill: "none", "aria-hidden": "true" },
                h("path", { d: "M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z", fill: "currentColor" })
              )
            ),
            h("h6", { className: "text-uppercase mb-1 text-muted" }, role),
            h("h5", { className: "mb-0" }, name),
            entry.getIn(["data", "linkedin"])
              ? h("ul", { className: "list-unstyled list-inline list-social mb-0" },
                  h("li", { className: "list-inline-item list-social-item me-3" },
                    h("img", { src: "/img/icons/social/linkedin.svg", className: "list-social-icon", alt: "LinkedIn" })
                  )
                )
              : null
          )
        )
      ),
      h("button", {
        type: "button", className: "btn btn-sm btn-outline-primary mt-4", onClick: this.openProfile
      }, "Open profile modal"),
      h("dialog", {
        id: "team-profile-preview",
        className: "team-preview__dialog",
        "aria-labelledby": "team-profile-name",
        ref: function(element) { self.dialog = element; },
        onClick: function(event) {
          if (event.target === self.dialog) {
            self.closeProfile();
          }
        }
      },
        h("div", { className: "modal-content" },
          h("div", { className: "modal-body" },
            h("button", {
              type: "button", className: "btn-close", "aria-label": "Close profile",
              onClick: this.closeProfile, autoFocus: true
            }),
            h("div", { className: "text-center" },
              h("img", { src: imageUrl, alt: name, className: "img-fluid mb-3 rounded team-preview__portrait" })
            ),
            h("h2", { id: "team-profile-name", className: "fw-bold text-center mb-1" }, name),
            h("p", { className: "fs-lg text-center text-muted mb-6 mb-md-8" },
              board ? role : null,
              board ? h("br") : null,
              title
            ),
            h("p", null, bio)
          )
        )
      )
    );
  }
});

CMS.registerPreviewTemplate("team", TeamPreview);
