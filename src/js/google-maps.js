document.addEventListener('DOMContentLoaded', async function () {
  if (!process.env?.GOOGLE_MAPS_KEY) return false

  const { Loader } = await import('@googlemaps/js-api-loader')
  const loader = new Loader({
    apiKey: process.env.GOOGLE_MAPS_KEY,
    version: 'weekly'
    // libraries: ['marker']
  })
  const [
    { Map, InfoWindow },
    { AdvancedMarkerElement }
  ] = await Promise.all([
    loader.importLibrary('maps'),
    loader.importLibrary('marker')
  ])

  let id = ''
  const options = {}
  if (typeof mapPoint !== 'undefined') {
    id = mapPoint.id
    options = {
      center: {
        lat: parseFloat(mapPoint.lat),
        lng: parseFloat(mapPoint.lng)
      },
      zoom: parseInt(mapPoint.zoom)
    }
  } else if (typeof mapOptions !== 'undefined') {
    id = mapOptions.id
    options = {
      center: {
        lat: parseFloat(mapOptions.lat),
        lng: parseFloat(mapOptions.lng)
      },
      zoom: parseInt(mapOptions.zoom)
    }
  } else {
    id = process.env.GOOGLE_MAPS_ID
    options = {
      center: {
        lat: parseFloat(process.env.GOOGLE_MAPS_LAT),
        lng: parseFloat(process.env.GOOGLE_MAPS_LNG)
      },
      zoom: parseInt(process.env.GOOGLE_MAPS_ZOOM)
    }
  }
  const map = new Map(document.getElementById(id), options)

  if (typeof mapPoint !== 'undefined') {
    const marker = new AdvancedMarkerElement({
      map,
      position: mapPoint.position
    })
    const infoOptions = { maxWidth: 200 }
    if (mapPoint?.content) infoOptions.content = mapPoint.content
    const infoWindow = new InfoWindow(infoOptions)
    marker.addListener("click", () => {
      // Optional: close any other open info window
      infoWindow.close(); 
      // infoWindow.setContent(content)
      infoWindow.open({
        map: map,
        anchor: marker, // Anchor the info window to the advanced marker
        shouldFocus: false, // Optional focus management
      })
    })
  } else if (typeof mapPoints !== 'undefined') {
    const markers = mapPoints.map(point => {
      const marker = new AdvancedMarkerElement({
        map,
        position: point.position
      })
      const infoOptions = { maxWidth: 200 }
      if (point?.content) infoOptions.content = point.content
      const infoWindow = new InfoWindow(infoOptions)
      marker.addListener("click", () => {
        // Optional: close any other open info window
        infoWindow.close(); 
        // infoWindow.setContent(content)
        infoWindow.open({
          map: map,
          anchor: marker, // Anchor the info window to the advanced marker
          shouldFocus: false, // Optional focus management
        })
      })
      return marker
    })
  }
})