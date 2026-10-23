CMS.registerEditorComponent({
  id: "isda-image",
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
      required: false,
      default: "img-fluid rounded shadow",
    },
    {
      name: "alt",
      label: "Alt Text (optional)",
      widget: "string",
      required: false,
    },
    {
      name: "maxwidth",
      label: "Max Width (optional)",
      widget: "string",
      required: false,
    },
    {
      name: "style",
      label: "Style (optional)",
      widget: "string",
      required: false,
    },
  ],
  pattern: /^{{<\s*image\s+((?:(?:src|class|alt|maxwidth|style)\s*=\s*(?:"[^"]*"|'[^']*'|[^\s"'<>}]+)\s*)+)>}}[ \t]*$/m,
  fromBlock: function (match) {
    var fields = { src: "", class: "", alt: "", maxwidth: "", style: "" };
    match[1].replace(/(src|class|alt|maxwidth|style)\s*=\s*(?:"([^"]*)"|'([^']*)'|([^\s"'<>}]+))/g,
      function (_, name, doubleQuoted, singleQuoted, unquoted) {
        fields[name] = doubleQuoted !== undefined ? doubleQuoted
          : singleQuoted !== undefined ? singleQuoted : unquoted;
      }
    );
    return fields;
  },
  toBlock: function (obj) {
    return `{{< image src="${obj.src || ""}" ${obj.class ? ` class="${obj.class}"` : ""}${obj.alt ? ` alt="${obj.alt}"` : ""}${
      obj.maxwidth ? ` maxwidth="${obj.maxwidth}"` : ""
    }${
      obj.style ? ` style="${obj.style}"` : ""
    } >}}`;
  },
  toPreview: function (obj) {
    if (!obj.src) {
      return "";
    }
    function escapeAttribute(value) {
      return String(value).replace(/&/g, "&amp;").replace(/"/g, "&quot;")
        .replace(/</g, "&lt;").replace(/>/g, "&gt;");
    }
    const classAttr = escapeAttribute((obj.class ? obj.class + " " : "") + "mt-5");
    const width = /^\d+$/.test(String(obj.maxwidth)) && Number(obj.maxwidth) > 0
      ? Number(obj.maxwidth) : 500;
    return `<img src="${escapeAttribute(obj.src)}" class="${classAttr}" alt="${escapeAttribute(obj.alt || "")}" width="${width}" style="${escapeAttribute(obj.style || "")}" />`;
  },
});
