CMS.registerEditorComponent({
  id: "image",
  label: "Image - iSDA",
  fields: [
    {
      name: "src",
      label: "Image Source",
      widget: "image",
    },
    {
      name: "class",
      label: "CSS Class (optional)",
      widget: "string",
      default: "img-fluid rounded shadow",
    },
    {
      name: "alt",
      label: "Alt Text (optional)",
      widget: "string",
    },
    {
      name: "maxwidth",
      label: "Max Width (optional)",
      widget: "string",
    },
    {
      name: "style",
      label: "Style (optional)",
      widget: "string",
    },
  ],
  pattern: /^{{<\s*image\s+src="([^"]+)"(?:\s+class="([^"]+)")?(?:\s+alt="([^"]+)")?(?:\s+maxwidth="([^"]+)")?(?:\s+style="([^"]+)")?\s*>}}$/m,
  fromBlock: function (match) {
    return {
      src: match[1],
      class: match[2] || "",
      alt: match[3] || "",
      maxwidth: match[4] || "",
      style: match[5] || "",
    };
  },
  toBlock: function (obj) {
    return `{{< image src="${obj.src}" ${obj.class ? ` class="${obj.class}"` : ""}${obj.alt ? ` alt="${obj.alt}"` : ""}${
      obj.maxwidth ? ` maxwidth="${obj.maxwidth}"` : ""
    }${
      obj.style ? ` style="${obj.style}"` : ""
    } >}}`;
  },
  toPreview: function (obj) {
    console.log(obj);
    const classAttr = obj.class ? `class="${obj.class} mt-5"` : 'class="mt-5"';
    const altAttr = obj.alt ? `alt="${obj.alt}"` : "";
    const styleAttr = obj.style ? `style="${obj.style}"` : "";
    return `<img src="${obj.src}" ${classAttr} ${altAttr} ${styleAttr} /">`;
  },
});