import './page'
import './google-maps'

document.addEventListener('DOMContentLoaded', async function () {
  const phones = document.querySelectorAll('input[name="phone"]')
  try {
    const { default: Inputmask } = await import('inputmask')
    phones.forEach(input => new Inputmask({
      mask: '(999) 999-99-99'
    }).mask(input))
  } catch (error) {
    console.error(error)
  }

  const [
    { default: intlTelInput },
    { default: en },
    { default: ru }
  ] = await Promise.all([
    import('intl-tel-input/intlTelInputWithUtils'),
    import('intl-tel-input/i18n/en'),
    import('intl-tel-input/i18n/ru')
  ])
  const intls = { ru, en }
  phones.forEach(input => {
    const iti = intlTelInput(input, {
      i18n: intls[pll_lang],
      initialCountry: pll_locale,
      validationNumberType: null,
      formatAsYouType: false
    })
    const countryCode = input.closest('.wpcf7-form').querySelector('.country-code')
    countryCode.value = iti.getSelectedCountryData().dialCode
    input.addEventListener('countrychange', () => {
      countryCode.value = iti.getSelectedCountryData().dialCode
    })
  })
})