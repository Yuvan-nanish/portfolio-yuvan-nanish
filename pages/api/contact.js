export default function handler(req, res) {
    if (req.method !== 'POST') {
        return res.status(405).json({ error: 'Method Not Allowed' });
    }

    const { name, email, subject, message } = req.body;

    // Debugging: Log received data
    console.log('Received:', { name, email, subject, message });

    res.status(200).json({ message: 'Message sent successfully' });
}
