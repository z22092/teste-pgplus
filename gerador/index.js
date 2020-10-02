const path = require('path')
const { generate } = require('./gerador');

if (process.argv.length === 3) {
  (async() => {
    try {
    await generate(process.argv[2])
    } catch (err) {
      console.error(err)
    }
  })()
}


module.exports = {
  generate
}