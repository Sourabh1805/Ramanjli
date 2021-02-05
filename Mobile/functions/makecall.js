import call from 'react-native-phone-call'

const args = {
    number: '9423591422', // String value with the number to call
    prompt: false // Optional boolean property. Determines if the user should be prompt prior to the call 
  }
  const makecall = () =>( 
  call(args).catch(console.error)
  )

  export default makecall; 