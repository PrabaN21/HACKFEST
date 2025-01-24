const express = require('express');
const mongoose = require('mongoose');
const multer = require('multer'); // For file upload handling
const csv = require('csv-parser'); // To parse CSV files
const fs = require('fs');
const path = require('path');
const xlsx = require('xlsx'); // For parsing Excel files
const app = express();

// MongoDB Atlas connection string
const mongoURI = 'mongodb+srv://try:1Qs5ve6pv1DHGr7z@clustertcelh1.j4ikv.mongodb.net/project_management?retryWrites=true&w=majority';

// Connect to MongoDB
mongoose.connect(mongoURI)
  .then(() => {
    console.log('Connected to MongoDB');
  })
  .catch((error) => {
    console.error('Failed to connect to MongoDB:', error);
  });

// Set up multer for file upload
const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, './uploads'); // File destination folder
  },
  filename: (req, file, cb) => {
    cb(null, Date.now() + '-' + file.originalname); // Unique file name
  }
});

const upload = multer({ storage: storage });

// Create uploads folder if not exists
if (!fs.existsSync('./uploads')) {
  fs.mkdirSync('./uploads');
}

// Serve static files (like HTML, CSS)
app.use(express.static(path.join(__dirname, 'public')));
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

// Homepage route
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

// Route to upload student/faculty datasheet
app.post('/upload', upload.single('datasheet'), (req, res) => {
  if (!req.file) {
    return res.status(400).send('No file uploaded');
  }

  const dataType = req.body.dataType; // Get whether it's 'student' or 'faculty'
  const filePath = req.file.path;

  // Read and parse the file based on its extension (CSV or Excel)
  const fileExtension = path.extname(req.file.originalname).toLowerCase();

  if (fileExtension === '.csv') {
    // Process CSV file
    processCSV(filePath, dataType, res);
  } else if (fileExtension === '.xlsx' || fileExtension === '.xls') {
    // Process Excel file
    processExcel(filePath, dataType, res);
  } else {
    return res.status(400).send('Unsupported file format');
  }
});

// Function to process CSV file
function processCSV(filePath, dataType, res) {
  const records = [];
  fs.createReadStream(filePath)
    .pipe(csv())
    .on('data', (row) => {
      records.push(row); // Store each row as a record
    })
    .on('end', () => {
      // Insert parsed data into the appropriate MongoDB collection
      saveToDatabase(records, dataType, res);
    });
}

// Function to process Excel file
function processExcel(filePath, dataType, res) {
  const workbook = xlsx.readFile(filePath);
  const sheetName = workbook.SheetNames[0];
  const sheet = workbook.Sheets[sheetName];
  const records = xlsx.utils.sheet_to_json(sheet);

  // Insert parsed data into the appropriate MongoDB collection
  saveToDatabase(records, dataType, res);
}

// Function to save data to the appropriate MongoDB collection
function saveToDatabase(records, dataType, res) {
  let model;
  if (dataType === 'student') {
    const studentSchema = new mongoose.Schema({}, { strict: false }); // Flexible schema for students
    model = mongoose.model('Student', studentSchema);
  } else if (dataType === 'faculty') {
    const facultySchema = new mongoose.Schema({}, { strict: false }); // Flexible schema for faculty
    model = mongoose.model('Faculty', facultySchema);
  } else {
    return res.status(400).send('Invalid data type');
  }

  // Insert the parsed data as documents in MongoDB
  model.insertMany(records)
    .then(() => {
      res.status(200).send(`${dataType.charAt(0).toUpperCase() + dataType.slice(1)} datasheet data uploaded successfully`);
    })
    .catch((error) => {
      res.status(500).send('Error saving data to database: ' + error);
    });
}

// Set up the server to listen on port 3000
const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Server running on http://localhost:${PORT}`);
});
