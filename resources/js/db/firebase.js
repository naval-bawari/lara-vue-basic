
import firebase from 'firebase/app'
import 'firebase/database'

export const db = firebase
  .initializeApp({ databaseURL: 'https://vue-firebase-1bb62.firebaseio.com' })
  .database()