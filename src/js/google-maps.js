document.addEventListener('DOMContentLoaded', async function () {
  const { Loader } = await import('@googlemaps/js-api-loader')
  const loader = new Loader({
    apiKey: process.env.GOOGLE_MAPS_KEY,
    version: 'weekly',
    libraries: ['marker']
  })

  const [
    { Map },
    { Marker },
    { InfoWindow }
  ] = await Promise.all([
    loader.importLibrary('maps'),
    loader.importLibrary('marker'),
    loader.importLibrary('streetView')
  ])
  let coords = null
  if (typeof point !== 'undefined') {
    coords = {
      center: {
        lat: point.lat,
        lng: point.lng
      },
      zoom: point.zoom
    }
  } else if (typeof position !== 'undefined') {
    coords = {
      center: {
        lat: position.lat,
        lng: position.lng
      },
      zoom: position.zoom
    }
  } else {
    coords = {
      center: {
        lat: parseFloat(process.env.GOOGLE_MAPS_LAT),
        lng: parseFloat(process.env.GOOGLE_MAPS_LNG)
      },
      zoom: parseInt(process.env.GOOGLE_MAPS_ZOOM)
    }
  }
  const map = new Map(document.getElementById('map'), coords)

  if (typeof points !== 'undefined' && points.length) {
    const markers = points.map(point => {
      const marker = new Marker({
        map,
        position: {
          lat: point.lat,
          lng: point.lng
        },
        title: point.title
      })
      const infoWindow = new InfoWindow()
      marker.addListener('click', () => {
        infoWindow.close()
        let content = point.thumbnail +
        `<div style="margin: 10px 0;font-size: 18px;text-align: center;font-weight: 500;">${marker.getTitle()}</div>`          
        if (point.price_in_baht) {
          content += `<div style="font-size: 18px;font-weight: 400;text-align: center;margin-bottom: 10px;color: rgba(128, 174, 52, 1);">${point.price_in_baht}</div>`
        }
        if (point.price_per_month_in_baht) {
          content += `<div style="font-size: 18px;font-weight: 400;text-align: center;margin-bottom: 10px;color: rgba(128, 174, 52, 1);">${point.price_per_month_in_baht}</div>`
        }
        content += `<a href="${point.permalink}" style="text-align: center;color: #000;font-size: 14px;font-weight: 500;display: block;">${point.more}</a>`
        infoWindow.setContent(content)
        infoWindow.open(marker.getMap(), marker)
      })
      return marker
    })
  }

  if (typeof point !== 'undefined') {
    const marker = new Marker({
      map,
      position: {
        lat: point.lat,
        lng: point.lng
      },
      title: point.title
    })
    const infoWindow = new InfoWindow()
    marker.addListener('click', () => {
      infoWindow.close()
      let content = point.thumbnail +
      `<div style="margin: 10px 0;font-size: 18px;text-align: center;font-weight: 500;">${marker.getTitle()}</div>`          
      if (point.price_in_baht && point.price_in_usd) {
        content += `<div style="font-size: 18px;font-weight: 400;text-align: center;margin-bottom: 10px;color: rgba(128, 174, 52, 1);">${point.price_in_baht} (${point.price_in_usd})</div>`
      }
      if (point.price_per_month_in_baht && point.price_per_month_in_usd) {
        content += `<div style="font-size: 18px;font-weight: 400;text-align: center;margin-bottom: 10px;color: rgba(128, 174, 52, 1);">${point.price_per_month_in_baht} (${point.price_per_month_in_usd})</div>`
      }
      content += `<a href="${point.permalink}" style="text-align: center;color: #000;font-size: 14px;font-weight: 500;display: block;">${point.more}</a>`
      infoWindow.setContent(content)
      infoWindow.open(marker.getMap(), marker)
    })
  }
})