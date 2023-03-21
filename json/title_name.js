var availableTags = [
    "นาย",
    "นาง",
    "นางสาว",
    "พล.ต.อ.",
    "พล.ต.อ.",
    "พล.ต.ท",
    "พล.ต.ท",
    "พล.ต.ต",
    "พล.ต.ต หญิง",
    "พ.ต.อ.",
    "พ.ต.อ.",
    "พ.ต.อ.",
    "พ.ต.อ.(พิเศษ) หญิง",
    "พ.ต.ท.",
    "พ.ต.ท. หญิง",
    "พ.ต.ต.",
    "พ.ต.ต. หญิง",
    "ร.ต.อ.",
    "ร.ต.อ. หญิง",
    "ร.ต.ท.",
    "ร.ต.ท. หญิง",
    "ร.ต.ต.",
    "ร.ต.ต. หญิง",
    "ด.ต.",
    "ด.ต. หญิง",
    "ส.ต.อ.",
    "ส.ต.อ. หญิง",
    "ส.ต.ท.",
    "ส.ต.ท. หญิง",
    "ส.ต.ต.",
    "ส.ต.ต. หญิง",
    "จ.ส.ต.",
    "จ.ส.ต. หญิง",
    "พลฯ",
    "พลฯ หญิง",
    "พล.อ.",
    "พล.อ. หญิง",
    "พล.ท.",
    "พล.ท. หญิง",
    "พล.ต.",
    "พล.ต.หญิง",
    "พ.อ.",
    "พ.อ.หญิง",
    "พ.อ.(พิเศษ)",
    "พ.อ.(พิเศษ) หญิง",
    "พ.ท.",
    "พ.ท.หญิง",
    "พ.ต.",
    "พ.ต.หญิง",
    "ร.อ.",
    "ร.อ.หญิง",
    "ร.ท.",
    "ร.ท.หญิง",
    "ร.ต.",
    "ร.ต.หญิง",
    "ส.อ.",
    "ส.อ.หญิง",
    "ส.ท.",
    "ส.ท.หญิง",
    "ส.ต.",
    "ส.ต.หญิง",
    "จ.ส.อ.",
    "จ.ส.อ.หญิง",
    "จ.ส.ท.",
    "จ.ส.ท.หญิง",
    "จ.ส.ต.",
    "จ.ส.ต.หญิง",
    "พลฯ",
    "ว่าที่ พ.ต.",
    "ว่าที่ พ.ต. หญิง",
    "ว่าที่ ร.อ.",
    "ว่าที่ ร.อ. หญิง",
    "ว่าที่ ร.ท.",
    "ว่าที่ ร.ท. หญิง",
    "ว่าที่ ร.ต.",
    "ว่าที่ ร.ต. หญิง",
    "พล.ร.อ.",
    "พล.ร.อ.หญิง",
    "พล.ร.ท.",
    "พล.ร.ท.หญิง",
    "พล.ร.ต.",
    "พล.ร.ต.หญิง",
    "น.อ.",
    "น.อ.หญิง",
    "น.อ.(พิเศษ)",
    "น.อ.(พิเศษ) หญิง",
    "น.ท.",
    "น.ท.หญิง",
    "น.ต.",
    "น.ต.หญิง",
    "ร.อ.",
    "ร.อ.หญิง",
    "ร.ท.",
    "ร.ท.หญิง",
    "ร.ต.",
    "ร.ต.หญิง",
    "พ.จ.อ.",
    "พ.จ.อ.หญิง",
    "พ.จ.ท.",
    "พ.จ.ท.หญิง",
    "พ.จ.ต.",
    "พ.จ.ต.หญิง",
    "จ.อ.",
    "จ.อ.หญิง",
    "จ.ท.",
    "จ.ท.หญิง",
    "จ.ต.",
    "จ.ต.หญิง",
    "พลฯ",
    "พล.อ.อ.",
    "พล.อ.อ.หญิง",
    "พล.อ.ท.",
    "พล.อ.ท.หญิง",
    "พล.อ.ต.",
    "พล.อ.ต.หญิง",
    "น.อ.",
    "น.อ.หญิง",
    "น.อ.(พิเศษ)",
    "น.อ.(พิเศษ) หญิง",
    "น.ท.",
    "น.ท.หญิง",
    "น.ต.",
    "น.ต.หญิง",
    "ร.อ.",
    "ร.อ.หญิง",
    "ร.ท.",
    "ร.ท.หญิง",
    "ร.ต.",
    "ร.ต.หญิง",
    "พ.อ.อ.",
    "พ.อ.อ.หญิง",
    "พ.อ.ท.",
    "พ.อ.ท.หญิง",
    "พ.อ.ต.",
    "พ.อ.ต.หญิง",
    "จ.อ.",
    "จ.อ.หญิง",
    "จ.ท.",
    "จ.ท.หญิง",
    "จ.ต.",
    "จ.ต.หญิง",
    "พลฯ",
    "หม่อม",
    "ม.จ.",
    "ม.ร.ว.",
    "ม.ล.",
    "ดร.",
    "ศ.ดร.",
    "ศ.",
    "ผศ.ดร.",
    "ผศ.",
    "รศ.ดร.",
    "รศ.",
    "นพ.",
    "พญ.",
    "นสพ.",
    "สพญ.",
    "ทพ.",
    "ทพญ.",
    "ภก.",
    "ภกญ.",
    "Mr.",
    "Mrs.",
    "Ms.",
    "Miss",
    "Dr."
];