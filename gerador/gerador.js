const uuid = require("uuid");
const axios = require("axios");
const moment = require("moment");
const fs = require("fs")
const operadoras = ["TIM", "NEXTEL", "CLARO", "VIVO", "OI"];


const generate = async (numb) => {
  const stream = fs.createWriteStream(`./files/${uuid.v1()}.txt`)
  const quotes = await axios("http://futuramaapi.herokuapp.com/api/characters/bender" )

  for (let i = 0; i < numb; i++) {
    const id = uuid.v4()
    const ddd = getRandomIntInclusive(10, 99)
    const pp = getRandomIntInclusive(99, 92)
    const ppppppp = getRandomIntInclusive(9999999, 0000000)
    const operadora = operadoras[getRandomIntInclusive(0, 4)]
    const time = moment(randomDate()).format("HH:mm:SS")
    const quote = (quotes.data[getRandomIntInclusive(0, quotes.data.length - 1)].quote).replace(/\n/g, ', ')
    stream.write(`${id};${ddd};${pp}${ppppppp};${operadora};${time};${quote}\n`)
  }
}

function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function randomDate() {
  const start = new Date(2020, 0, 1)
  const end = new Date()
  return new Date(start.getTime() + Math.random() * (end.getTime() - start.getTime()));
}

module.exports = {
  generate
}