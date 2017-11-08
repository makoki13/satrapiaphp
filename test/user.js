// notice here I'm requiring my database adapter file
// and not requiring node-postgres directly
const db = require('./db')

const pool = new Pool({
  user: 'postgres',
  host: 'localhost',
  database: 'postgres',
  password: 'vimvsp',
  port: 3211,
})

pool.query('SELECT NOW()', (err, res) => {
  console.log(err, res)
  pool.end()
})

const client = new Client({
	user: 'postgres',
	host: 'localhost',
	database: 'postgres',
	password: 'vimvsp',
	port: 3211,
})
client.connect()

client.query('SELECT NOW()', (err, res) => {
  console.log(err, res)
  client.end()
})