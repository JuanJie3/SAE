from json import*
import json
from os import read, write
import itertools

def est_base(c):
    '''
    la fonction prends en paramettre un caractère 
    et retournant True si ce caractère correspond à 
    une base de l'ADN 
    '''

    if c == 'A' or c == 'T' or c == 'G' or c == 'C' :
        return True 


def adn_base(s):
    '''
    adn_base prends en paramètre une chaîne de caractères
    et retournant True si la chaîne correspond à un ADN 
    et false sinon 
    '''
    for i in s:
        if  not(est_base(i)):
            return False
    return True 


def arn(adn):
    '''
    L'ARN est construit à partir de l'ADN en remplaçant la 
    thymine T par l'uracile codé par la lettre U. Ainsi la 
    transcription de la séquence ADN 
    '''

    char = ""
    if adn_base(adn) == False:
        return None
    for lettre in adn:

        if lettre == 'T':
            char += 'U'
        else : 
            char += lettre   
    return char 

def arn_to_codons(arn):
    '''
    arn_to_codons prends en paramètre une chaîne de caractères correspondant
    à de l'ARN et découpant cet ARN en codons. La fonction doit 
    retourner un tableau contenant la liste des codons.
    '''

    t = []
    codon = ""
    compteur = 0

    for lettre in arn :
        codon += lettre            
        compteur += 1   

        if compteur == 3:
            t.append(codon)
            compteur = 0
            codon = ""
    return t

def load_dico_codons_aa(filename):
    '''
    Le fichier data/codons_aa.json contient la correspondance
    entre codons et acides aminés au format JSON. Les codons
    qui ne sont pas dans le fichier sont les codons stop.
    '''

    o = open(filename)
    strjson = o.read()
    o.close()
    #cours = json.loads(strjson)
    dico = json.loads(strjson)
    return dico 

dico = load_dico_codons_aa("Data/codons_aa.json")    

def codons_stop(dico):
    '''
    codons_stop prends en paramètre un dictionnaire dont les clés sont 
    les codons et les valeurs les acides aminés correspondants 
    (chaînes de caractères). La fonction retournera un tableau 
    contenant l'ensemble des codons stop, c'est-à-dire l'ensemble
    des codons possibles avec les caractères AUGC qui ne sont pas
    des clés du dictionnaire. 
    '''

    t = ["A", "U", "C", "G"]
    t2 = []
    stop = []


    for cle, cle2, cle3 in itertools.product(t, t, t):
        t2.append(cle + cle2 + cle3)
    
    for key in t2 :
        if key not in dico :
            stop.append(key)
    return stop

s = codons_stop(dico)
#print(s)

codons222 = ['AAA', "UGC", "UUU"]

def codon_to_aa(codons222, dico):
    '''
    prenant en paramètre un tableau de codons (correspondant par exemple à
    une valeur retournée par la fonction arn_to_codons) et 
    le dictionnaire de correspondance entre codons et acides 
    aminés. La fonction devra retourner un tableau contenant 
    les acides aminés correspondant aux codons
    '''
    codons = ['AGC', "UGC", "UUU"]
    t = []
    print()

    for cle in codons222 :
        if cle in codons :
            return t
        t.append(dico[cle])
            
    return t
      

#print(codon_to_aa(codons222, dico))
