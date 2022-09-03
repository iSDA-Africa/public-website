function getDocs() {
    document.getElementById('docsExecute').style.display = 'none';
    document.getElementById('docsLoading').style.display = 'block';
    fetch('https://api.isda-africa.com/v1/docs')
    .then(data=>{return data.json()})
    .then(res => {
        const responseElement = document.getElementById('docsResponse');
        responseElement.innerText = JSON.stringify(res, null, 2);
        responseElement.style.display = 'block'
        document.getElementById('docsLoading').style.display = 'none';
        document.getElementById('docsExecute').style.display = 'block';
    })
}

function getLayers() {
    document.getElementById('layersExecute').style.display = 'none';
    document.getElementById('layersLoading').style.display = 'block';
    fetch('https://api.isda-africa.com/v1/layers?key=AIzaSyCruMPt43aekqITCooCNWGombhbcor3cf4')
    .then(data=>{return data.json()})
    .then(res => {
        const responseElement = document.getElementById('layersResponse');
        responseElement.innerText = JSON.stringify(res, null, 2);
        responseElement.style.display = 'block'
        document.getElementById('layersLoading').style.display = 'none';
        document.getElementById('layersExecute').style.display = 'block';
    })
}

function fetchProperties() {
    fetch('https://api.isda-africa.com/v1/layers?key=AIzaSyCruMPt43aekqITCooCNWGombhbcor3cf4')
    .then(data => {return data.json()})
    .then(result => {
        let allDepths = [
        {key: -998, value: '0', text: "0 cm"},
        // {key: -997, value: '20', text: "20 cm"},
        // {key: -996, value: '50', text: "50 cm"},
        {key: -996, value: '0-20', text: "0-20 cm"},
        {key: -995, value: '20-50', text: "20-50 cm"},
      ]
      const properties = Object.keys(result.property).map(key => {
          return {
            depths: result.property[key].depths.values.map((val, id) => ({key: id, value: val, text: val + ' cm'})) || [],
            key: key,
            value: key,
            text: result.property[key].description
          }
        });

      const propertySelect = document.getElementById("property");
      clearSelect(propertySelect);
      properties.forEach((property) => {
        const option = document.createElement("option");
        option.text = property.text;
        option.value = JSON.stringify(property);
        propertySelect.add(option);
      });

      updateDepthSelect(JSON.stringify(properties[0]));
      updateSoilURL();
    })
    .catch(err => {
        console.log(err);
    });
}

function updateDepthSelect(value) {
    const property = JSON.parse(value);
    const depthSelect = document.getElementById("depth");
    clearSelect(depthSelect);

    property.depths.forEach((depth) => {
        const option = document.createElement("option");
        option.text = depth.text;
        option.value = depth.value;
        if(option.value === "0-20") option.selected = true;
        depthSelect.add(option);
    });

    updateSoilURL();
}

function clearSelect(select) {
    const length = select.options.length;
    for (i = length-1; i >= 0; i--) {
        select.options[i] = null;
    }
}

function getSoilProperties() {
    document.getElementById('soilExecute').style.display = 'none';
    document.getElementById('soilLoading').style.display = 'block';

    const lat = document.getElementById('lat').value;
    const long = document.getElementById('long').value;
    const property = JSON.parse(document.getElementById('property').value);
    const depth = document.getElementById('depth').value;

    const url = `https://api.isda-africa.com/v1/soilproperty?key=AIzaSyCruMPt43aekqITCooCNWGombhbcor3cf4&lat=${lat}&lon=${long}&property=${property.value}&depth=${depth}`;

    fetch(url)
    .then(data => data.json())
    .then(res => {        
        const responseElement = document.getElementById('soilResponse');
        responseElement.innerText = JSON.stringify(res, null, 2);
        responseElement.style.display = 'block'
        document.getElementById('soilLoading').style.display = 'none';
        document.getElementById('soilExecute').style.display = 'block';
    });
}

function updateSoilURL() {
    const lat = document.getElementById('lat').value;
    const long = document.getElementById('long').value;
    const property = JSON.parse(document.getElementById('property').value);
    const depth = document.getElementById('depth').value;

    document.getElementById("soilURL").innerText = `https://api.isda-africa.com/v1/soilproperty?key=AIzaSyCruMPt43aekqITCooCNWGombhbcor3cf4&lat=${lat}&lon=${long}&property=${property.value}&depth=${depth}`;
}