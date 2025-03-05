<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Paiement</title>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-lg mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-[#003A66] text-white text-center py-4 text-xl font-semibold">
            Confirmation de Paiement
        </div>
        <div class="p-6 text-gray-700">
            <p class="mb-4">Bonjour,</p>
            <p class="mb-2">Votre paiement a été confirmé avec succès.</p>
            <div class="bg-gray-100 p-4 rounded-lg mb-4">
                <p><span class="font-semibold">💰 Montant payé :</span> {{ $amount }}</p>
                <p><span class="font-semibold">📅 Durée :</span> {{ $days }} jours</p>
                <p><span class="font-semibold">📍 Réservation :</span> du {{ \Carbon\Carbon::parse($start_date)->format('M d, Y') }} au {{ \Carbon\Carbon::parse($to)->format('M d, Y') }} </p>
            </div>
            <p class="mb-4">Merci pour votre confiance !</p>
            <div class="text-center">
                <a href="{{ url('/home') }}" class="bg-[#E02454] text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-700 transition-all">
                    Voir mes réservations
                </a>
            </div>
        </div>
        <div class="text-center text-sm text-gray-500 py-4">
            © {{ date('Y') }} Touristay.com - Tous droits réservés
        </div>
    </div>
</body>
</html>
